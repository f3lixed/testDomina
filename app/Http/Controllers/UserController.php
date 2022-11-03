<?php

namespace App\Http\Controllers;

use App\Capacitacion;
use App\CapacitacionUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
      return view('users.index');
    }

    public function primero(Request $request)
    {
      $result = 0;
      $data = explode(",",$request->primero);
  	  foreach($data as $value){
  	    if($value==8){
  	      $result = $result + 5;
  	    }else{
    	    if (($value % 2) == 0) {
    	      $result = $result + 1;
    	    }else{
    	      $result = $result + 3;
    	    }
    	  }
  	  }
      $response = array("status"=>"success", "message"=>$result);
  	  echo json_encode($response);
    }

    public function segundo(Request $request)
    {
      $arrayData = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
      $response = array("status"=>"success", "message"=>1);
      if ($request->ini<0 || $request->fin<0) {
        $response['message'] = -1;
      }
      if($request->ini>$request->fin){
        $response['message'] = 0;
      }else if($request->ini>count($arrayData)){
        $response['message'] = 0;
      }
      if ($response['message']>0) {
        $result = 0;
        for ($i=$request->ini; $i<=$request->fin; $i++) {
          if($i<count($arrayData)){
            $result = $result + $arrayData[$i];
          }
        }
        $response['message'] = $result;
      }
      echo json_encode($response);
    }

    public function tercero(Request $request)
    {
      $horaArray = explode(":",$request->hora);
      $h = $horaArray[0];
      $m = $horaArray[1];
      $response = array("status"=>"success", "message"=>1);
      if (is_numeric($h) && is_numeric($m)) {
        $result = 0;
        if($h>6){
          $hc = (12 - $h)*30;
        }else{
          $hc = $h*30;
        }
        $mc = 6*$m;
        if($m<=30){
          $result = $mc-$hc;
        }else{
          if($h<7){
            $result = $mc-$hc;
          }else{
            $result = $hc+$mc;
          }
        }

        if($result>180){
          $result = 360-$result;
        }
        $response['message'] = $result;
      }else{
        $response['message'] = "Error: los datos ingresados no son compatibles!";
      }
      echo json_encode($response);
    }
}
