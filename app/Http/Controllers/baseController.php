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
    $data['profit'] = $this->findMaxProfit($data['qdata']->toArray());
    return view('stockPrice.index')->with('data', $data);
  }

  private function findMaxProfit($pricesObject)
  {
    $bestProfit = 0;
    $pricetem = $pricesObject;
    for ($index = 0; $index < count($pricesObject); $index++) { 
        $tem = array_splice($pricetem, 0, $index);
        foreach($tem as $comparator){
          $comparatorProfit = $pricesObject[$index]['CLOSE'] - $comparator['CLOSE'];
          if($comparatorProfit < 0 && $comparatorProfit < $bestProfit){
            $bestProfit = $comparatorProfit; 
          }
      }
    }
      return -$bestProfit;
    
  }




}
