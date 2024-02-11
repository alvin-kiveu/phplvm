<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        $username = session()->get('username');
        $user = DB::table('users')
            ->where('username', $username)
            ->first();

        if ($user === null) {
            return redirect('/login');
        }

        return $next($request);
    }
}
