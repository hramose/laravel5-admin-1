# Laravel 5 Admin

##Introduction
A starter dashboard app build with Laravel 5.1 Including users and roles management.

##Included
* Laravel 5.1
* Bootstrap

##Installation

###Step 1

Clone the repo
```
git clone https://github.com/rasitapalak/laravel5-admin.git
```

or download the zip file
```
https://github.com/rasitapalak/laravel5-admin/archive/master.zip
```

###Step 2

Install dependencies
```
cd laravel5-admin
composer install
```

###Step 3

Copy .env.example file as .env
Configure database settings in .env file.

###Step 4

Generate a unique key for your application.
```
php artisan key:generate
```

###Step 5

Create and seed the database
```
php artisan migrate
php artisan db:seed
```

###Step 6

Change permissions of storage folder.
```
chmod 755 -R storage
```

This should work but if not try
```
chmod 777 -R storage
```

###Step 7

Init and login to application

```
php artisan serve
```

Username : admin

Password : admin







