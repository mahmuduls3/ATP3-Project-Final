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

    public function searchProperty(Request $req){
      $title = $req->title;
      $location = $req->location;
      $type = $req->type;
      $purpose = $req->purpose;
      $status = $req->status;
      $bed = $req->bed;
      $bath = $req->bath;
      $floor = $req->floor;
      $sq_ft_from = $req->sq_ft_from;
      $sq_ft_to = $req->sq_ft_to;
      $price_from = $req->price_from;
      $price_to = $req->price_to;

      $query = DB::table('property')->select('property_id', 'title', 'property_price', 'property_area', 'p_type', 'style', 'bed', 'bath', 'feet', 'floor', 'description', 'status', 'no_of_clicks', 'date', 'username');
      if($title){
        $query->where(function ($q) use ($title){
          $q->where('title', 'like', "%$title%");
        });
      }
      if($location){
        $query->where(function ($q) use ($location){
          $q->where('property_area', 'like', "%$location%");
        });
      }
      if ($type) {
        $query->where('p_type', $type);
      }
      if ($purpose) {
        $query->where('style', $purpose);
      }
      if ($status) {
        $query->where('status', $status);
      }
      if ($bed) {
        $query->where('bed', $bed);
      }
      if ($bath) {
        $query->where('bath', $bath);
      }
      if ($floor) {
        $query->where('floor', $floor);
      }
      if ($sq_ft_from) {
        $query->where('feet', '>=', $sq_ft_from);
      }
      if ($sq_ft_to) {
        $query->where('feet', '<=', $sq_ft_to);
      }
      if ($price_from) {
        $query->where('property_price', '>=', $price_from);
      }
      if ($price_to) {
        $query->where('property_price', '<=', $price_to);
      }
      $query->orderBy('property_id', 'asc');

      $property = $query->get();
      return view('adminHome.allProperty', ['property'=> $property]);
    }
}
