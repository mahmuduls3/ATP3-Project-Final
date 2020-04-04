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

    public function customerDetail($username){
      $customer = DB::table('customer')
                     ->where('username', $username)
                     ->get()->first();
      if ($customer!=null) {
         return view('adminMain.customerDetail',['customer'=> $customer]);
        }else {
         return redirect('/adminHome');
        }
    }

    public function propertyDetail($property_id){
      $property = DB::table('property')
                     ->where('property_id', $property_id)
                     ->get()->first();
      if ($property!=null) {
         return view('adminMain.propertyDetail',['property'=> $property]);
        }else {
         return redirect('/adminHome');
        }
    }
}
