<?php

use OrkhanShukurlu\Csrf\Csrf;

if (! function_exists('csrf_field')) {
    /**
     * CSRF token üçün input generasiya edir
     *
     * @return string
     * @throws Exception
     */
    function csrf_field(): string
    {
        return Csrf::field();
    }
}

if (! function_exists('csrf_token')) {
    /**
     * CSRF token dəyəri generasiya edir
     *
     * @return string
     * @throws Exception
     */
    function csrf_token(): string
    {
        return Csrf::token();
    }
}

if (! function_exists('csrf_validate')) {
    /**
     * CSRF tokenin doğruluğunu yoxlayır
     *
     * @param  array $request
     * @return bool
     */
    function csrf_validate(array $request): bool
    {
        return Csrf::validate($request);
    }
}