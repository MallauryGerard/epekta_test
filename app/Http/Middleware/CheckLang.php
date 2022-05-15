<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CheckLang
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('lang')) {
            App::setLocale(Session::get('lang'));
        }
        return $next($request);
    }
}
