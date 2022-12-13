# PHP CSRF

## Kurulum
```shell
    composer require orkhanshukurlu/php-csrf
```

### Basit Kullanım
`vendor/autoload.php` dosyasını dahil ettikten sonra `Csrf` sınıfını üretin. Sınıfı `new` anahtar kelimesiyle çağırdığınızda token üretecektir. Tokeni kullanmak için:
```php
    use ahmetbarut\Csrf\Csrf;

    require __DIR__ . "/vendor/autoload.php";

    // Sınıfı ürettiğinizde token oluşturur. Herhangi bir istek yoksa üretilir, istek varsa token üretmez. 
    $csrf = new Csrf;

    // Üretilen token değerini getirir.
    $csrf->getToken();
```
### HTML İçinde Kullanım Ve Kontrol
Burda kolay kullanım açısından form içinde helper fonksiyonları kullanılıyor. İki yöntemi de kullanabilirsiniz.

## ! Not :
`hasToken` yöntemine gelen verileri olduğu gibi veriniz arkaplanda, `input[name=_token]` olarak bakacaktır.
```php
<?php
    use ahmetbarut\Csrf\Csrf;

    require __DIR__ . "/vendor/autoload.php";

    $csrf = new Csrf;
    if($_POST){
        $csrf->tokenHas($_POST); // bool
    }
?>

<form method="POST">
    <?=csrf_field()?>
    <input type="text" name="test">
    <button>Gönder</button>
</form>
```

| Method      | Hakkında |
| :---        |    :----:
| __construct | Nesne üretildiğinde beraberinde `session`'u başlatır ve token oluşturur.    |
| tokenHas   | Verilen tokeni, oluşturulan token ile karşılaştırır.    |
| getToken   | Oluşturulan son tokeni döndürür.
| csrf_field   | İnput oluşturur ve token verir. Helper fonksiyonudur. 
| create_token   | Yeni token oluşturur.