<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // protected $connection = 'mysql';
    public function __construct(){
      // $this->connection = config('database.connections.mysql');
      $this->connection = config('tenant');
    }

}
