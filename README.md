# Movies-App

Movies app is a Laravel/Backpack based project for managing a movie collection for my university project for the 'PHP-Frameworks' class.


## Prerequisites
Before you can boot up the app you need a few things:

-   PHP <7.3
-   Composer
-   Mysql

## How to spin up
### 1. Clone the repo
Clone the repo to you local machine using git....
```bash
git clone https://github.com/nstanev255/movies-app
```
### 2. Navigate into the project & install the needed composer dependencies.
Navigate into the project
```bash
cd movies-app/
```

Install the needed dependencies with composer.
```bash
composer install
```

### 3. Configure your database.
You can either just use docker and docker-compose, or install mysql manually.

#### 3.1.1 (optional) Install mysql manually.
You can check [this](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04) tutorial in order to get mysql up and running manually.

- Create a new database named 'movies-app' 
- Go into the `.env` file and edit the database username and password `DB_USERNAME, DB_PASSWORD` with your details.

#### 3.1.2 (optional) Use docker-compose.
The project already comes with a configured ready to go mysql docker container. \
You just need to run the following command:
```bash
docker compose up -d
```

### 3.2 Run the migrations.
Run the laravel migrations in order for the database tables to be created. \
\
Run the following command :
```bash
php artisan migrate
```

### 3.3 Run the seeds.
Run the laravel seeds in order for the database to have some initial records in the tables. \
\
Run the following command :
```bash
php artisan db:seed
```


### 4 Start the app
Start the app from the dev server. \
NOTE: You need to bind the port to `80` in order for backpack to work properly.

```bash
php artisan serve --port 80
```

### 5. Some notes
1. Initially the index page might be empty, as there are no records created yet in the database. In order to create new records you need to navigate to the `/admin` page and register a new admin account. From there you can log in and start creating new records. 
2. The application's admin panel is powered by [Backpack CRUD](https://github.com/Laravel-Backpack/CRUD), which is a convenient way for spinning up admin dashboards fast.

## License
Distributed under the MIT License. See LICENSE.txt for more information.
