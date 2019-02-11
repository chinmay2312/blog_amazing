#Amazing blog

The objective is to create simple blog application using Laravel.

Features:

- User can singup, login, logout 
- Form entries are protected against Cross-Site Request Forgery attacks
- User can view list of all posts
- User can comment on any post, including own.

##Prerequisites

- PHP 5.6
- Laravel 5
- MySQL (Please modify .env file for customized configuration of database)
- web server    (This project was developed using local server WAMP)

After setting up database, wth correct credentials in .env file (which is at the topmost level), execute the following code in command line:

`php artisan migrate`

This command will setup the tables in your database

##Routes

- /home     : Homepage with index table of all posts with title, author-name, creation-date
- /author/post/detail/<enter post-id-here> View full post

##Author
- Chinmay Gangal