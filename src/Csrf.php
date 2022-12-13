<?php

namespace OrkhanShukurlu\Csrf;

class Csrf
{
    public static function check(array $request): bool
    {
        return isset($request['_token'], $_SESSION['_token']) && hash_equals($request['_token'], $_SESSION['_token']);
    }

    public static function field(): string
    {
        return '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    }

    public static function token(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['_token'])) {
            $_SESSION['_token'] = bin2hex(random_bytes(40));
        }

        return $_SESSION['_token'];
    }
}