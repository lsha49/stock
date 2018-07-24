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
    $this->iniQData();
    $this->iniNData();
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


  private function iniQData(){
    $datas[] = (new \RestClient([
      'base_url' => 'https://api.intrinio.com',
     ]))->get('prices', [
      'Authorization: Basic '. base64_encode("7d41d2042b619d345bcdf85fd693b0f5:ede90d53b6996ebe97bf3e7469be7584"),
      'identifier' => 'QCOM',
      'start_date' => '2017-06-01',
      'end_date' => '2018-07-01',
      'frequency' => 'daily',
     ])->decode_response()->data;

     DB::beginTransaction();
     try {
      foreach ($datas as $data) {
        $qdata = new Qdata();
        $qdata->DATE = $data->date;
        $qdata->CLOSE = $data->close;
        $qdata->save();
      }
     } catch (Exception $e) {
         DB::rollBack();
         return response()->json([
             "message" => "Action Failed",
             "status_code" => 400,
         ], 400);
     }
     DB::commit();
     return response()->json([
         "message" => "Action Successful",
         "status_code" => 200,
     ], 200);
  }


  private function iniNData(){
    $datas[] = (new \RestClient([
      'base_url' => 'https://api.intrinio.com',
     ]))->get('prices', [
      'Authorization: Basic '. base64_encode("7d41d2042b619d345bcdf85fd693b0f5:ede90d53b6996ebe97bf3e7469be7584"),
      'identifier' => 'NDAQ',
      'start_date' => '2017-06-01',
      'end_date' => '2018-07-01',
      'frequency' => 'daily',
     ])->decode_response()->data;

        DB::beginTransaction();
        try {
          foreach ($datas as $data) {
            $ndata = new Ndata();
            $ndata->DATE = $data->date;
            $ndata->CLOSE = $data->close;
            $ndata->save();
        }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "message" => "Action Failed",
                "status_code" => 400,
            ], 400);
        }
        DB::commit();
        return response()->json([
            "message" => "Action Successful",
            "status_code" => 200,
        ], 200); 
  }

  
  





}
