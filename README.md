Comment me! - is a Laravel SPA application for sharing comments with the people. You can visit it at http://briefnews.dp.ua/

On the main page you can see test comments generated by seeders.
You can sort comments by user name, user email or create date. By default, sort by creation date descending order. You can select any sorting. It save in session so your choice will remain even if you close the site.
You can create new comment or answer to an existing one or answer to the answer and so on ad infinitum. The application has unlimited nesting.

In 1-documentation folder you can see:
developmentLog.txt - description of application development step by step;
uml folder - project of database;
mysqlDumpDB folder - dump of database with test data;

-Install of application:<br>
recommended OS:<br>
    Ubuntu 22<br>
requirements:<br>
    php 8.1 or newer<br>
    MySQL<br>
    git<br>
    composer<br>
In terminal open folder where you will be install the project.
Clone project from github repository:
    git clone https://github.com/satnetuser001/comments.git
Go to the 'comments' project folder.
Install dependencies using Composer:
    composer install

-Prepare the database and database user:
In terminal login to MySQL as root:
    mysql -uroot -p
Create database:
    CREATE DATABASE comments
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
Create database user:
    CREATE USER 'comments_app'@'localhost' IDENTIFIED BY '1077';
Grant privileges to database user:
    GRANT ALL PRIVILEGES ON comments.* TO 'comments_app'@'localhost';
Exit from MySQL:
    EXIT

-Roll back a database backup:
In terminal open folder 1-documentation/mysqlDumpDB.
Load a database backup:
    mysql -uroot -p comments < comments.sql

-To run the application:
You need unoccupied port 8000.
In a terminal, open the application folder and run:
    php artisan serve
Open in browser:
    http://127.0.0.1:8000/


-Not implemented requirements from a test task:
use frontend framework - I'm a backend developer;
use Docker - I don't know this technology yet;
HTML tags in comments and working with files - I couldn't complete it on time because I underestimated the time it would take.