# CodeIgniter 4 Framework

## About

This project is a CRUD using Codeigniter 4 with SmartAdmin Template.

## Demo

See a demo of the project by clicking [here](http://br138.teste.website/~con37959/users/public/admin/users).

## How to install?

Clone the project.

Rename the env to .env, put your database settings and base url of your application.
Run the migrations so that the tables are created:
``php spark migrate``

To run the application run:
`` php spark serve``
  
## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
