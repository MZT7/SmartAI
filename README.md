# SmartAI Laravel Vue.js Inertia Project Setup

This README provides step-by-step instructions to set up a Laravel project with Vue.js and Inertia.

## Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and npm
- A database (MySQL)

## Setup Steps

Once you have pull the Code from this repo,Then follow this steps:

1.Install NPM dependencies:

    npm install

2.Install COMPOSER dependencies:

    composer install

3.Configure your database in the `.env` file:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

4.Run database migrations:

    php artisan migrate

5.Start the Laravel development server:

    5.1 In one terminal, run the Laravel server:
        php artisan serve

    5.2 In another terminal, compile assets:
        npm run dev

6.Start the CronJob & Broadcasting server for realtime update:

      6.1 php artisan schedule:work
      
      6.2 php artisan reverb:start
      
      6.3 php artisan queue:listen

## API Documentation

API documentation is available at (http://localhost:8000/request-docs) after running the development server.

List of the Required API Routes:

- GET /autobots
- GET /autobots/1/posts
- GET /api/posts/1/comments
  