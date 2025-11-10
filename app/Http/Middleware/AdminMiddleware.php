<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Kezeli a bejövő kérést.
     */
    public function handle(Request $request, Closure $next)
    {
        // Ha be van jelentkezve és admin a role-ja → engedjük tovább
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Ha nem admin, visszadobjuk a főoldalra (vagy átírhatod /login-ra is)
        return redirect('/');
    }
}
