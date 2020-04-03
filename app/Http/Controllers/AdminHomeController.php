<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index(Request $req){
      if($req->session()->has('username')){
        return view('adminHome.index');
      }else {
        return redirect('/adminLogin');
      }
    }

    public function allCustomer(){
      $customer = DB::table('customer')
                      ->select('customer_id', 'username', 'name', 'type', 'phone', 'email', 'c_image', 'active_posts', 'pending_posts', 'sold_posts', 'total_posts')
                      ->get();
      if ($customer!=null) {
        return view('adminHome.allCustomer',['customer'=> $customer]);
      }else {
        return redirect('/adminHome');
      }
    }

    public function allProperty(){
      $property = DB::table('property')
                      ->get();
      if ($property!=null) {
        return view('adminHome.allProperty',['property'=> $property]);
      }else {
        return redirect('/adminHome');
      }
    }
}
