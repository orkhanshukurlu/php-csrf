<?php

namespace OrkhanShukurlu\Csrf;

use Exception;

class Csrf
{
    const TOKEN_NAME = '_token';
    const TOKEN_SIZE = 20;

    /**
     * CSRF token üçün input generasiya edir
     *
     * @return string
     * @throws Exception
     */
    public static function field(): string
    {
        return '<input type="hidden" name="' . self::TOKEN_NAME . '" value="' . self::token() . '">';
    }

    /**
     * CSRF token dəyəri generasiya edir
     *
     * @return string
     * @throws Exception
     */
    public static function token(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (! isset($_SESSION[self::TOKEN_NAME])) {
            $_SESSION[self::TOKEN_NAME] = bin2hex(random_bytes(self::TOKEN_SIZE));
        }

        return $_SESSION[self::TOKEN_NAME];
    }

    /**
     * CSRF tokenin doğruluğunu yoxlayır
     *
     * @param  array $request
     * @return bool
     */
    public static function validate(array $request): bool
    {
        return isset($request[self::TOKEN_NAME], $_SESSION[self::TOKEN_NAME]) && hash_equals($request[self::TOKEN_NAME], $_SESSION[self::TOKEN_NAME]);
    }
}