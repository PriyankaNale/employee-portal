# CakePHP Employee Portal


## Installation

Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.


Download Composer or update composer self-update.
Download this repository - git clone git@github.com:cakephp/bookmarker-tutorial
Install dependencies with composer - composer install.
Add the schema to a new database.
Configure your database credentials in app_local.php. Run database migrations.
Start the server bin/cake server -p 8765.
Go to http://localhost:8765 in your browser.

## Database
Create Database

Change the database setting in app_local.php
Add username password and db name.

create table employees (
id INT AUTO_INCREMENT PRIMARY KEY,
name varchar(20) NOT NULL,
email varchar(200) NOT NULL,
phone_number int(20) NOT NULL,
photo varchar(200) NOT NULL,
birth_date DATE NOT NULL
);