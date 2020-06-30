# Laravel Vue SPA

## Requirements

PHP 7.2 or greater


## Setup

**Run the following command**

```
git clone git@github.com:am2umbrele/LaravelVueSPA.git
```
**Install dependencies**
```
composer install
```
**Change .env database parameters** 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
**Run migrations**
```
php artisan migrate
```
## Run

**Start server using PHP's built-in development server**

```
php artisan serve
```
**Watch all relevant front-end files for changes**

```
npm run watch
```
