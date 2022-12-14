<?php

/**
 * CSRF token üçün sessiyada saxlanılan açar söz
 *
 * @var string CSRF_SESSION
 */
const CSRF_SESSION = '__csrf_session__';


if (! function_exists('csrf_field')) {
    /**
     * CSRF token inputu generasiya edir

     * @param  string $name
     * @param  int $length
     * @return string
     *
     * @throws Exception
     */
    function csrf_field(string $name = '_token', int $length = 40): string
    {
        return '<input type="hidden" name="' . $name . '" value="' . csrf_token($length) . '">';
    }
}

if (! function_exists('csrf_token')) {
    /**
     * CSRF token dəyəri generasiya edir
     *
     * @param  int $length
     * @return string
     *
     * @throws Exception
     */
    function csrf_token(int $length = 40): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (! isset($_SESSION[CSRF_SESSION])) {
            $_SESSION[CSRF_SESSION] = bin2hex(random_bytes($length / 2));
        }

        return $_SESSION[CSRF_SESSION];
    }
}

if (! function_exists('csrf_validate')) {
    /**
     * CSRF tokenin doğruluğunu yoxlayır
     *
     * @param  array $request
     * @param  string $name
     * @return bool
     */
    function csrf_validate(array $request, string $name = '_token'): bool
    {
        return isset($request[$name], $_SESSION[CSRF_SESSION]) && hash_equals($request[$name], $_SESSION[CSRF_SESSION]);
    }
}
