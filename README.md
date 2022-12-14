# PHP CSRF

![latest release](https://img.shields.io/badge/PHP->=7.3-blue.svg?style=flat-square)
![latest release](https://img.shields.io/badge/Version-1.0.0-red.svg?style=flat-square)
![latest release](https://img.shields.io/badge/License-MIT-success.svg?style=flat-square)

PHP-CSRF sizə veb-saytınızı CSRF hücumlarından qorumaq üçün bir sıra funksiyalar təklif edir. Bu funksiyalardan istifadə edərək yazdığınız vebsaytı həm daha təhlükəsiz etmiş olacaqsınız həm də botlardan və arzuolunmaz insanlardan uzaq tutacaqsınız

## Tələblər

* PHP 7.3+

## Yükləmə

```
composer require orkhanshukurlu/php-csrf
```

## İstifadə

Funksiyaları istifadə edəcəyiniz fayllarda `vendor/autoload.php` faylını daxil etmək lazımdır

```php
require __DIR__.'/vendor/autoload.php';
```

## Funksiyalar

`csrf_field(string $name = '_token', int $length = 40) - CSRF token inputu generasiya edir`

- `$name` - Generasiya olunacaq `input`-un adıdır (`name`-i). İlkin olaraq dəyəri `_token` təyin edilmişdir
- `$length` - Generasiya olunacaq tokenin simvol sayıdır. İlkin olaraq dəyəri `40` simvol təyin edilmişdir

Funksiya `html`-də `form` elementinin daxilində istifadə edilməlidir. Beləliklə `type`-ı `hidden`, `name`-i `_token`, `value`-si `40` simvoldan ibarət olan `input` generasiya olunacaq. İstifadəsi aşağıdakı kimidir:

```php
<?php require __DIR__.'/vendor/autoload.php'; ?>

<form action="#" method="POST">
    <?=csrf_field();?>
</form>
```

Generasiya olunan `input` `html`-də aşağıdakı kimi görünəcək:

```html
<input type="hidden" name="_token" value="a60e5c1048225b366c4d48c0f87e07ad2cad3583">
```

<br>

`csrf_token(int $length = 40) - CSRF token dəyəri generasiya edir`

- `$length` - Generasiya olunacaq tokenin simvol sayıdır. İlkin olaraq dəyəri `40` simvol təyin edilmişdir

Funksiya `40` simvoldan ibarət token generasiya edir. Əgər yalnız token dəyəri lazımdırsa bu funksiyanı istifadə edə bilərsiniz. İstifadəsi aşağıdakı kimidir:

```php
<?php

require __DIR__.'/vendor/autoload.php';

echo csrf_token();
```

Generasiya olunan token aşağıdakı kimi görünəcək:

```html
a60e5c1048225b366c4d48c0f87e07ad2cad3583
```

<br>

`csrf_validate(array $request, string $name = '_token') - CSRF tokenin doğruluğunu yoxlayır`

- `$request` - Tokenin doğru olub olmadığını yoxlamaq üçün göndəriləcək dəyişəndir
- `$name` - Generasiya olunacaq `input`-un adıdır (`name`-i). İlkin olaraq dəyəri `_token` təyin edilmişdir

Funksiya `form`-da göndəriləcək tokenin doğru olub olmadığını yoxlayır. Beləliklə `form` göndəriləndə token dəyəri düzgündürsə `true`, düzgün deyilsə `false` dəyəri geri döndürür. Funksiyaya parametr kimi `$_GET`, `$_POST` və ya `$_REQUEST` dəyişənlərindən biri ötürülməlidir. İstifadəsi aşağıdakı kimidir:

```php
<?php

require __DIR__.'/vendor/autoload.php';

if (csrf_validate($_POST)) {
    // Token dəyəri düzgündür, heç bir xəta yoxdur
}

else {
    // Token dəyəri düzgün deyil, xəta baş verdi
}
```

## Əlaqə

**Email**: orkhandev@gmail.com