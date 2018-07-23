<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Role extends Model
{

protected $connection = 'mysql';


  public function users()
  {
    return $this->belongsToMany(User::class);
  }
}
