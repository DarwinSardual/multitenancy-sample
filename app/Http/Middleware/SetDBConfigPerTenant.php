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
        config(['database.connections.tenant1' => [
          "driver" => "mysql",
          "host" => "127.0.0.1",
          "port" => "3306",
          "database" => "multitenancy_tenant1",
          "username" => "devuser",
          "password" => "devuser",
          "unix_socket" => "",
          "charset" => "utf8mb4",
          "collation" => "utf8mb4_unicode_ci",
          "prefix" => "",
          "prefix_indexes" => true,
          "strict" => true,
          "engine" => null,
        ]]);

        return $next($request);
    }
}
