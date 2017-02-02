# test-full-stack
Test for full stack developers.

This is a simple (in functionality) login page with features to register a new user and update the details. It has a Illuminate\Database as a dependency; however, in itself is framework agnostic. It implements a very basic "template" approach to avoid yet another dependency to this project.

When you start, please create your own public repo and on github or bitbucket and do an initial commit before your start your work.

We want to see commits as you go, we will be rating your commit comments and the the chunks of what you commit with what you are trying to achieve.

Please send the link to your repo back to us alex@pbwebdev.com.au and CC mail@pbwebdev.com.au

## Project Structure

### app
In this folder you have the core PHP files for this system to work, the main components here are the Controllers, Models, Views and Data classes (only one at the moment).

Also it is important to note that the routes are rudimentary defined in /app/routes.php file, each route should match a class/method in the Controllers

### database and config
Make sure you create a database called "fs_test", the script is located in /DATABASE_DUMP.sql it has the definition of the 'users' table and 1 record, the password for that record is "password01"
Please update the /app.Config.php file with the connection strings for your environment. It is also important to update the "LOCAL_ROOT" variable with one that fits your environment.

### dependencies
- PHP: Illuminate\Database (composer)
- JS: bootstrap, jquery (bower)
- CSS: bootstrap (bower)
- NPM: bower, gulp, laravel-elixir

### project installation

It is assumed that your dev computer has nodeJS installed as we will be using its build tools

1. Clone the project
2. npm install
3. bower install
4. composer install --prefer-dist
5. gulp watch

## backend tasks

Implement the following:

1. Profile page (/profile) where the user can update all their details including password
2. Logout (/logout) destroys session and redirects to login
3. Register (/register) creates a new user and logs them in (no need to login right after the account is created)

## frontend tasks

Bootstrap and Jquery are already added to the project, so use bootstrap to enhance the look and feel of:

1. Login form
2. Error message handling
3. Jquery for form/input validation
4. Extra bonus if you manage to add other front end dependencies (e.g. jquery-ui) through bower

Good luck!