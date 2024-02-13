<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CheckInstallation
{
    public function handle($request, Closure $next)
    {

        // Check if database is not connected
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return redirect('/install');
        }

        // Check if .env file exists
        if (!file_exists(base_path('.env'))) {
            return redirect('/install');
        }

        return $next($request);
    }
}
