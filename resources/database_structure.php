<?php

$a_basic_tables_structure = array(
    "access_log" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "username" =>              array("type" => "VARCHAR(255)", "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
        "ip_address" =>            array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "initial_access" =>        array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "num_successes" =>         array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "num_failures" =>          array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "num_reset_attempts" =>    array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "reset_expiration" =>      array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "reset_key" =>             array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "accesses" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "name" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "level" =>                 array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "parent" =>                array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "buglog" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "datetime" =>              array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "deleted" =>               array("type" => "TINYINT",      "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "status" =>                array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "is_response" =>           array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "userid" =>                array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "owner_userid" =>          array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "original_post_id" =>      array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "query" =>                 array("type" => "TEXT",         "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "classes" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "crn" =>                   array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "year" =>                  array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
        "semester" =>              array("type" => "VARCHAR(3)",   "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
        "subject" =>               array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "course" =>                array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "campus" =>                array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "days" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "days_times_locations" =>  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "start_date" =>            array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "end_date" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "time" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "location" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "hours" =>                 array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "title" =>                 array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "instructor" =>            array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "seats" =>                 array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "limit" =>                 array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "enroll" =>                array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "parent_class" =>          array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "subclass_identifier" =>   array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "user_ids_with_access" =>  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "last_mod_time" =>         array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
    ),
    "feedback" => array( // same as buglog
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
                         "datetime" =>              array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                         "deleted" =>               array("type" => "TINYINT",      "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                         "status" =>                array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                         "is_response" =>           array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                         "userid" =>                array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                         "owner_userid" =>          array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                         "original_post_id" =>      array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                         "query" =>                 array("type" => "TEXT",         "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "generated_settings" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "user_id" =>               array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
        "private_icalendar_key" => array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "students" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "disabled" =>              array("type" => "TINYINT",      "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "username" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "email" =>                 array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "pass" =>                  array("type" => "VARBINARY(255)","indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "accesses" =>              array("type" => "TEXT",         "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "semester_whitelist" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "user_id" =>               array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
        "year" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "semester" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "json" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "semester_blacklist" => array( // same as semester_whitelist
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
                                   "user_id" =>               array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
                                   "year" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                                   "semester" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                                   "json" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                                   "time_submitted" =>        array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "semester_classes" => array( // same as semester_whitelist
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
                                 "user_id" =>               array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
                                 "year" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                                 "semester" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                                 "json" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
                                 "time_submitted" =>        array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "subjects" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "abbr" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "title" =>                 array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "semester" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "year" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "time_submitted" =>        array("type" => "DATETIME",     "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "tabs" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "_deleted" =>              array("type" => "TINYINT",      "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "draw_tab" =>              array("type" => "TINYINT",      "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "order" =>                 array("type" => "INT",          "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "accesses" =>              array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "name" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "printed_name" =>          array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    ),
    "user_settings" => array(
        "id" =>                    array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => TRUE,  "special" => "AUTO_INCREMENT"),
        "user_id" =>               array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
        "type" =>                  array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "share_schedule_with" =>   array("type" => "TEXT",         "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "session_timeout" =>       array("type" => "INT",          "indexed" => TRUE,  "isPrimaryKey" => FALSE, "special" => ""),
        "enable_icalendar" =>      array("type" => "TINYINT",      "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => ""),
        "default_semester" =>      array("type" => "VARCHAR(255)", "indexed" => FALSE, "isPrimaryKey" => FALSE, "special" => "")
    )
);

$a_database_insert_values = array(
    "accesses" => array(
        array("name"=>"feedback",       "level"=>1),
        array("name"=>"createfeedback", "level"=>1),
        array("name"=>"deletefeedback", "level"=>2, "parent"=>"createfeedback"),
        array("name"=>"users",          "level"=>1),
        array("name"=>"create",         "level"=>2, "parent"=>"users"),
        array("name"=>"modify",         "level"=>2, "parent"=>"users"),
        array("name"=>"password",       "level"=>3, "parent"=>"modify"),
        array("name"=>"development",    "level"=>1),
        array("name"=>"bugtracker",     "level"=>2, "parent"=>"development"),
        array("name"=>"createposts",    "level"=>2, "parent"=>"development"),
        array("name"=>"deleteposts",    "level"=>2, "parent"=>"development"),
        array("name"=>"createbugs",     "level"=>2, "parent"=>"development"),
        array("name"=>"deletebugs",     "level"=>2, "parent"=>"development")
    ),
    "tabs" => array(
        array("name"=>"Calendar", "printed_name"=>"Calendar", "draw_tab"=>1, "order"=>0, "_deleted"=>0),
        array("name"=>"Schedule", "printed_name"=>"Schedule", "draw_tab"=>1, "order"=>2, "_deleted"=>0),
        array("name"=>"Custom",   "printed_name"=>"Custom",   "draw_tab"=>1, "order"=>4, "_deleted"=>0),
        array("name"=>"Classes",  "printed_name"=>"Classes",  "draw_tab"=>1, "order"=>6, "_deleted"=>0),
        array("name"=>"Lists",    "printed_name"=>"Lists",    "draw_tab"=>1, "order"=>8, "_deleted"=>0),
        array("name"=>"Settings", "printed_name"=>"Settings", "draw_tab"=>1, "order"=>10, "_deleted"=>0),
        array("name"=>"Feedback", "printed_name"=>"Feedback", "draw_tab"=>1, "order"=>12, "accesses"=>"feedback", "_deleted"=>0),
        array("name"=>"Users",    "printed_name"=>"Users",    "draw_tab"=>1, "order"=>14, "accesses"=>"users", "_deleted"=>0),
        array("name"=>"Account",  "printed_name"=>"Account",  "draw_tab"=>1, "order"=>16, "_deleted"=>0)
    )
);

?>
