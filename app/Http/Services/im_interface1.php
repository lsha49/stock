<?php

namespace App\Http\Services;

use App\Http\Models\Tsdb1;
use App\Http\Services\interface1;

class im_interface1 implements interface1
{

    public function getAll()
    {

      $tsdbs = Tsdb1::all();

      return $tsdbs;
    }


}
