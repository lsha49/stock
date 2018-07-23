<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session;
use Redirect;

use App\Http\Models\Qdata;
use App\Http\Models\Ndata;



////////////////////////////
class baseController extends Controller
{

  public function index()
  {
    $data['qdata'] = Qdata::all();
    $data['ndata'] = Ndata::all();
    $data['qprofit'] = $this->findMaxProfit($data['qdata']->toArray());
    $data['nprofit'] = $this->findMaxProfit($data['ndata']->toArray());
    return view('stockPrice.index')->with('data', $data);
  }

  private function findMaxProfit($pricesObject)
  {
    $bestProfit = 0;
    for ($index = 0; $index < count($pricesObject); $index++) { 
        $pricetem = $pricesObject;
        $tem = array_splice($pricetem, 0, $index);
        foreach($tem as $comparator){
          $comparatorProfit = $pricesObject[$index]['CLOSE'] - $comparator['CLOSE'];
          if($comparatorProfit < $bestProfit){
            $bestProfit = $comparatorProfit; 
          }
      }
    }
      return -$bestProfit;
  }




}
