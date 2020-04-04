<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMainController extends Controller
{
    public function index(){
      $property = DB::table('property')
                    ->where('status', 'featured')
                    ->get();
      if ($property!=null) {
        return view('adminMain.index', ['property'=>$property]);
      }else {
        echo "error viewing main page";
      }
    }
}
