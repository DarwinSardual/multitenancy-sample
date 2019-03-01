<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Tenant;

class MigrateTenantTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:tenant {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate tenant tables into their respective DBs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $id = $this->option('id');
      $tenant = Tenant::find($id);

      $connection = [
        'database.connections.temp' => [
          "driver" => "mysql",
          "host" => $tenant->db_host,
          "port" => $tenant->db_port,
          "database" => $tenant->db_name,
          "username" => $tenant->db_username,
          "password" => $tenant->db_password,
          "unix_socket" => "",
          "charset" => "utf8mb4",
          "collation" => "utf8mb4_unicode_ci",
          "prefix" => "",
          "prefix_indexes" => true,
          "strict" => true,
          "engine" => null,
        ]
      ];

      config($connection);

      $this->call(
        'migrate',
        [
          '--database' => 'temp',
          '--path' => '/database/migrations/tenant'
        ]
      );
    }
}
