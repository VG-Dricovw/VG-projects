<?php

namespace Core;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth'=> Authenticator::class,
    ];

    public static function resolve($key) {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key] ?? false;
        
        if (!$middleware) {
            throw new \Exception('no matching middleware' . $key .' here');
        }

        (new $middleware())->handle();
     
    }
}