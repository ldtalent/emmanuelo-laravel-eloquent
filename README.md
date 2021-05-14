# emmanuelo-laravel-eloquent

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects

## Installation
Clone the repository to your server directory www or htdocs

```Git 
git clone https://github.com/learningdollars/emmanuelo-laravel-eloquent.git
```
Navigate to emmanuelo-laravel-eloquent and run the following commands on the terminal

```Composer
composer install
```

```Node
npm install && npm run dev
```

Modify the content of .env file to match your database credentials.

```php
php artisan serve
```

# Query Caching
####  This package shall aid caching queries with similar output for faster quering of records
```Composer
composer require darkghosthunter/rememberable-query
```
# Usage
```php
/*
Call the remember method on a model and provide the duration in hours, for this case it's one hour. Queries are cached so that the next time you query similar information, it's retrieved from cache and returns faster. 
*/

$user = User::with('posts')->remember(60 * 60)->find(Auth::id());
```
#

- Navigate to http://localhost:8000 to load the landing page
- To visualize laravel telescope analytics, follow http://localhost:8000/telescope

## Collaboration

If you need to collaborate with me, please send an e-mail to Emmanuel Obua via [obuaemmanuel10@gmail.com](mailto:obuaemmanuel10@gmail.com).

