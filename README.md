# CakePHP Employee Portal


## Installation

Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.


1.Download Composer or update composer self-update. <br />
2.Download this repository - git clone https://github.com/PriyankaNale/employee-portal.git <br />
3.Install dependencies with composer - composer install. <br />
4.Add the schema to a new database. <br />
5.Configure your database credentials in app_local.php. Run database migrations. <br />
6.Start the server bin/cake server -p 8765. <br />
Go to http://localhost:8765 in your browser. <br />

## Database
Create Database

Change the database setting in app_local.php <br />
Add username password and db name.
 <br />
create table employees (
id INT AUTO_INCREMENT PRIMARY KEY,
name varchar(20) NOT NULL,
email varchar(200) NOT NULL,
phone_number int(20) NOT NULL,
photo varchar(200) NOT NULL,
birth_date DATE NOT NULL
);
