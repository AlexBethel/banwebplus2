banwebplus2
==========

Make personal class scheduling simpler.

## Example use
The original project is currently in use at https://beanweb.us, but is
no longer functional. This version is currently deployed at
https://beanweb2.a-bethel.net/index.php.

## Why?
This project was originally conceived to help [New Mexico Tech](http://www.nmt.edu/) students create a user schedule.
The school's [existing website](https://banweb7.nmt.edu/pls/PROD/hwzkcrof.p_uncgslctcrsoff) is time-consuming to use. Putting together
classes for a schedule was a painstaking process that often took 2-3 hours every semester. Now, it takes 5 minutes.

## Installing
1. Install MySQL, Apache, and git
2. clone project to /some/path/beanweb
3. access /some/path/beanweb in a web browser (may require some amount of Apache configuration)
4. follow the steps necessary to make all statuses successful (green)

## Features
* select classes
* easily view classes that conflict with those you've already selected
* either log in as a user or a guest
* guest settings are saved on the local machine
* view your schedule in a concise overview
* view a calendar view
* import calendar into google calendar/outlook calendar/icalendar
* share schedule with a friend
* create custom classes
* share custom classes
* whitelist or blacklist certain class criteria
* report bugs/provide feedback
* multiple semesters, complete with course history
* scrape data off of the [existing NMT website](https://banweb7.nmt.edu/pls/PROD/hwzkcrof.p_uncgslctcrsoff)

## To do
* Make all documentation consistent.
* Figure out how to disable directory listings. (NixOS seems to make
  this a bit trickier than it need be.)
* Remove the requirement to have an admin user registered.
* Re-do all the CSS and assets, both to look more modern and be more
  maintainable.
* Either remove user accounts entirely, or implement proper password
  hashing; until one of these is done, user accounts remain in the
  system but disabled in the UI.
* Remove irrelevant features: e.g., bugs and feedback; use GitHub
  issues and the admin e-mail instead.
* Modify the overall project organization to avoid the need for the
  source directory to be mutable; currently, scraped data gets written
  to $ROOT/scraping, and this directory needs to be mutable for the
  system to work correctly.
* Make the project simpler and easier to maintain using a server-side
  web framework. Probably clean up the database usage using a proper
  ORM.
* Add integration with the registrar published course catalog
  documents: add course descriptions and prerequisites to the GUI.
  Possibly also add degree requirements to the GUI.
* (Very long term, probably will never happen:) Re-write the project
  in something other than PHP.
