<?php

namespace App\Http\Services;

use App\Http\Models\Tsdb;
use App\Http\Models\Tsdb1;
use App\Http\Models\Tsdb2;
use App\Http\Models\Tsdb3;
use App\User;


class service1
{

    public static function valueResult($modelName,$id1,$id2)
    {

      $tsdbs = $modelName::whereBetween('id', array($id1,$id2))
                 ->get();

      return $tsdbs;
    }


    public static function sqlResult($modelName,$id)
    {
      $entity = $modelName::find($id);

      return $entity;
    }


    public static function processing1($tsdbs)
    {
      $tsdbs[1]->value=10000; //define your function
      return $tsdbs;
    }



    public static function updateToTsdb ($tsdbs, $tem1, $tem2)
    {
      $tsdbs->$tem1  = $tem2;
      $tsdbs->save();

    }


    public static function insertToTsdb($Tsdb, $tem1, $tem2)
    {
      $Tsdb->time = $tem1;
      $Tsdb->s_1 = $tem2;
      $Tsdb->save();

    }























}
