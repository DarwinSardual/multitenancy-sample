<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // protected $connection = 'tenant';
    public function __construct(){
      // dd(config('database.connections.tenant1'));
      $this->connection = 'tenant';
    }

}
