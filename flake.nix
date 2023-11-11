{
  description = ''
    banwebplus2, an NMT Banweb client.

    This flake automatically configures a MariaDB server and an Apache
    server, and should get the service up and running out of the box.
    (TLS is not directly supported out of the box, but should be easy
    to add; I do it by running this module inside a NixOS container,
    then using an nginx virtual host with ACME.) It also configures a
    systemd timer to run the scraping script on a regular basis.
  '';

  outputs = { self, nixpkgs }: {
    nixosModules.default = { config, lib, pkgs, ... }: {
      options = with lib; {
        services.banwebplus2 = {
          enable = mkOption {
            description = ''
              Enable banwebplus2, an NMT Banweb client.
            '';
            default = false;
          };

          domainName = mkOption {
            description = ''
              The domain name banwebplus2 is being hosted on; this is
              used for configuring Apache httpd, and also for a few
              on-site links and such.
            '';
            default = "localhost";
          };

          # don't really think it'll ever change, but the tool exposes
          # this option and it doesn't seem *completely* useless.
          timezone = mkOption {
            description = ''
              Time zone to display banwebplus2 dates and times in. For
              NMT this should almost always be America/Denver.
            '';
            default = "America/Denver";
          };

          feedbackEmail = mkOption {
            description = ''
              E-mail address to direct feedback on the site to.
            '';
            default = "nobody@nowhere.invalid";
          };

          # Note that the tool provides options for SQL database
          # address and credentials; we're assuming here that the
          # database is hosted on the server machine (I don't think
          # there will ever be a reason not to do so). Given this
          # fact, we use UNIX socket authentication instead and never
          # set an SQL password.
        };
      };

      config =
        let
          svcCfg = config.services.banwebplus2;
          mysqlConfig = pkgs.writeTextDir "resources/mysql_config.ini" ''
            host = localhost
            user = wwwrun
            password = this-string-does-not-matter
          '';
          serverConfig = pkgs.writeTextDir "resources/server_config.ini" ''
            maindb=beanweb
            global_path_to_jquery=/jquery/js/jquery-1.9.0.js
            timezone=${svcCfg.timezone}
            fqdn=${svcCfg.domainName}
            feedback_email=${svcCfg.feedbackEmail}
          '';
          mergedRoot = pkgs.symlinkJoin {
            name = "banwebplus2";
            paths = [
              ./.
              mysqlConfig
              serverConfig
            ];
          };

          # PHP will try to resolve references inside those files
          # relative to the real files, not the symlinks, which is
          # hella annoying for us. Fix it by making a version without
          # symlinks.
          unSymlinkedRoot = pkgs.runCommand "banwebplus2" {} ''
            cp -rL ${mergedRoot} $out
          '';
        in
        lib.mkIf svcCfg.enable {
          services.httpd = {
            enable = true;
            enablePHP = true;
            virtualHosts.${svcCfg.domainName} = {
              documentRoot = unSymlinkedRoot;
            };
          };

          services.mysql = {
            enable = true;
            package = pkgs.mariadb;
            ensureUsers = [{
              # wwwrun is the default username used by httpd.
              name = "wwwrun";
              ensurePermissions = {
                "beanweb.*" = "ALL PRIVILEGES";
              };
            }];
            ensureDatabases = [ "beanweb" ];
          };

          systemd.services.banwebplus2-scrape = {
            description = "Scraper for NMT Banweb";
            serviceConfig.User = "wwwrun";
            script = ''
              set -x
              root=$(mktemp -d)
              cd $root

              ${unSymlinkedRoot}/scraping/new_mexico_tech_banweb.py -v
              ${pkgs.php}/bin/php ${unSymlinkedRoot}/scraping/php_to_mysql.php

              cd
              rm -rf $root
            '';
          };
        };
    };
  };
}
