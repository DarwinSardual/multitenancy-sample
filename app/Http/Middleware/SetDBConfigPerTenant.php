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
        $connection = [];

        if($user->tenant != null){
          $connection['database.connections.tenant'] = [
            "driver" => "mysql",
            "host" => $user->tenant->db_host,
            "port" => $user->tenant->db_port,
            "database" => $user->tenant->db_name,
            "username" => $user->tenant->db_username,
            "password" => $user->tenant->db_password,
            "unix_socket" => "",
            "charset" => "utf8mb4",
            "collation" => "utf8mb4_unicode_ci",
            "prefix" => "",
            "prefix_indexes" => true,
            "strict" => true,
            "engine" => null,
          ];
        }else{
          $connection['database.connections.tenant'] = config('database.connections.mysql');
        }

        config($connection);

        return $next($request);
    }
}
