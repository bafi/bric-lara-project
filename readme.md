## Requirements
* The project is a simple CRUD app with 2 different fields
* use Form Requests for validations
* The application will send an email when the CRUD record is created or updated; this has to be efficient meaning that the application has to be fast!
* Console command that sends an email every hour

## Installation
* Composer install in order to install the packages
* Configure database connection on your machine by changing the params in .env file
* `php artisan migrate` to migrate the tables.
* `php artisan serve` to start the application.
* Run `php artisan hourly:email` to send hourly email 


## Notes
* I was focusing on backend structure regardless the UI/UX
* Emails are run in jobs and you have to run this command `php artisan queue:work` to proceed on it.
* I commited the .env file to have the same configuration, but don't forget to change the database connection.
