## Laravel Web-Application

A simple Web Application and how to install it

[![](https://img.shields.io/badge/Laravel-v10.26.2-ff2e21.svg)](https://laravel.com)
[![](https://img.shields.io/badge/bootstrap-v5.3-712cf9.svg)](https://getbootstrap.com)

- [Laravel 10.x](https://github.com/laravel/laravel)
- [Bootstrap](https://getbootstrap.com/)


Laravel is accessible, powerful, and provides tools required for large, robust applications.

## List of Task

- ✅ Eloquent Models:
- ✅ Controller Actions
- ✅ Middleware
- ✅ Queues
- ✅ Events and Listeners
- ✅ Import and Export


## How To Use
#### Clone the repository

```bash
git clone https://github.com/shaon-sarker/laravel-webapp.git
```

#### Copy .env.example file to .env and edit credentials also set app url
```bash
cp .env.example .env
```
#### Configure env file for Database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_application
DB_USERNAME=root
DB_PASSWORD=
```

#### Install Via Composer

```bash
composer install
```

#### Generate Application Key

```bash
php artisan key:generate
```

#### Migrate Database

```bash
php artisan migrate
```

#### Run Seeder

```bash
php artisan db:seed
```

#### Run this application

```bash
php artisan serve
```





