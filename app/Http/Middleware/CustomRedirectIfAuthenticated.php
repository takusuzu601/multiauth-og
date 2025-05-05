<?php

namespace App\Http\Middleware;

// 追加
use Illuminate\Auth\Middleware\RedirectIfAuthenticated as BaseRedirectIfAuthenticated;

class CustomRedirectIfAuthenticated extends BaseRedirectIfAuthenticated
{
     /**
     * Get the default URI the user should be redirected to when they are authenticated.
     */
    protected function defaultRedirectUri(): string
    {
        if (request()->routeIs('admin.*')) {
            return route('admin.dashboard');
        }
        return route('user.dashboard');
    }
}
