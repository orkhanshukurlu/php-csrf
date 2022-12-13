![latest release](https://img.shields.io/badge/PHP->=7.3-blue.svg?style=flat-square)
![latest release](https://img.shields.io/badge/Version-1.0.0-red.svg?style=flat-square)
![latest release](https://img.shields.io/badge/License-MIT-success.svg?style=flat-square)

# PHP CSRF

PHP CSRF, PHP üçün yazılmış CSRF token paketidir. Siz bu paket vasitəsilə yazdığınız layihəni həm CSRF hücumlarından qoruyacaqsınız həm də layihənizi daha təhlükəsiz etmiş olacaqsınız

## Tələblər

* PHP 7.3+

## Yükləmə

```
composer require orkhanshukurlu/php-csrf
```

## İstifadə
`vendor/autoload.php` faylını səhifəyə daxil etdikdən sonra CSRF istifadə etmək mümkündür
```php
require __DIR__.'/vendor/autoload.php';
```

### `Csrf::field() - csrf_field()`
CSRF token üçün gizli input generasiya edir. `Html`-də `<form>` elementinin daxilinə uyğun metod və ya funkisyanı əlavə etmək lazımdır
```php
require __DIR__.'/vendor/autoload.php';

// Csrf sinifi vasitəsi ilə istifadə
use OrkhanShukurlu\Csrf\Csrf;

echo Csrf::field(); // 
// Funksiya vasitəsi ilə istifadə
```