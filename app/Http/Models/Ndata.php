<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Ndata extends Model
{
  public $timestamps = false;
  protected $table = "NASDAQ1";
  protected $connection = 'mysql';

}
