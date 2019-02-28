<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class SetDBConfigPerTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        config(['database.connections.tenant' => [
            'host' => '127.0.0.1',
            'password' => '',
            'database' => 'multitenancy_tenant1',
            'username' => 'root'
        ]]);

        return $next($request);
    }
}
