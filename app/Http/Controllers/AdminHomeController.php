<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index(Request $req){
      if($req->session()->has('username')){
        $property = DB::table('property')
                    ->where('status', 'pending')
                    ->get();
        if ($property!=null) {
          return view('adminHome.index', ['property'=>$property]);
        }else {
          return redirect('/adminLogout');
        }

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

    public function customerDetail($username){
      $customer = DB::table('customer')
                     ->where('username', $username)
                     ->get()->first();
      if ($customer!=null) {
         return view('adminHome.customerDetail',['customer'=> $customer]);
        }else {
         return redirect('/adminHome');
        }
    }

    public function activePosts($username){
      $property = DB::table('property')
                  ->where('username', $username)
                  ->where('status', 'allowed')
                  ->get();
      if ($property!=null) {
        return view('adminHome.activePosts', ['property'=>$property]);
      }
    }

    public function pendingPosts($username){
      $property = DB::table('property')
                  ->where('username', $username)
                  ->where('status', 'pending')
                  ->get();
      if ($property!=null) {
        return view('adminHome.pendingPosts', ['property'=>$property]);
      }
    }

    public function soldPosts($username){
      $property = DB::table('property')
                  ->where('username', $username)
                  ->where('status', 'sold')
                  ->get();
      if ($property!=null) {
        return view('adminHome.soldPosts', ['property'=>$property]);
      }
    }

    public function totalPosts($username){
      $property = DB::table('property')
                  ->where('username', $username)
                  ->get();
      if ($property!=null) {
        return view('adminHome.totalPosts', ['property'=>$property]);
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

    public function accept($id){
      $property = DB::table('property')
                     ->where('property_id', $id)
                     ->update(['status'=>'allowed']);
      if ($property!=null) {
        $customer = DB::table('customer')
                       ->join('property', 'property.username', '=', 'customer.username')
                       ->where('property.property_id', $id)
                       ->increment('active_posts');
        if ($customer!=null) {
          return redirect('/adminHome');
        }
      }else {
        return redirect('/adminLogin');
      }
    }

    public function deny($id){
      $property = DB::table('property')
                     ->where('property_id', $id)
                     ->update(['status'=>'denied']);
      if ($property!=null) {
        $customer = DB::table('customer')
                       ->join('property', 'property.username', '=', 'customer.username')
                       ->where('property.property_id', $id)
                       ->increment('total_posts');
        if ($customer!=null) {
          return redirect('/adminHome');
        }
      }else {
        return redirect('/adminLogin');
      }
    }
/*
    public function acceptPending($username){
      $property = DB::table('property')
                     ->where('username', $username)
                     ->update(['status'=>'allowed']);
      if ($property!=null) {
        return redirect('/pendingPosts/{username}');
      }else {
        return redirect('/adminLogin');
      }
    }

    public function denyPending($username){
      $property = DB::table('property')
                     ->where('username', $username)
                     ->update(['status'=>'denied']);
      if ($property!=null) {
        return redirect('/pendingPosts/{username}');
      }else {
        return redirect('/adminLogin');
      }
    }
*/
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
      $orderby = $req->orderby;

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
      if ($orderby) {
        if ($orderby == "most_recent") {
          $query->orderBy('date', 'desc');
        }
        if ($orderby == "most_previous") {
          $query->orderBy('date', 'asc');
        }
        if ($orderby == "price_h_l") {
          $query->orderBy('property_price', 'desc');
        }
        if ($orderby == "price_l_h") {
          $query->orderBy('property_price', 'asc');
        }
        if ($orderby == "feet_h_l") {
          $query->orderBy('feet', 'desc');
        }
        if ($orderby == "feet_l_h") {
          $query->orderBy('feet', 'asc');
        }
      }
      $query->orderBy('property_id', 'asc');

      $property = $query->get();
      return view('adminHome.allProperty', ['property'=> $property]);
    }
}
