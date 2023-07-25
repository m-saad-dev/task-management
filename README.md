# Installation

## Install all the dependencies using composer
    composer install


## Migration
create new Data base and set the database connection section in .env file.

    #Database Section
    DB_DATABASE=data_base_name
    DB_USERNAME=user_name
    DB_PASSWORD=password 

## Run migrations
    php artisan migrate

## Start the local development server
    php artisan serve

## build CSS and JS assets
    sudo npm run dev


