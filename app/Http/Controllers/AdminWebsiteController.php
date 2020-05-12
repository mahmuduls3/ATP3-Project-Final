<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminWebsiteController extends Controller
{
    public function index(){
      return view('adminWebsite.index');
    }

    public function aboutUs(){
      return view('adminWebsite.about-us');
    }

    public function blog(){
      return view('adminWebsite.blog');
    }

    public function contact(){
      return view('adminWebsite.contact');
    }

    public function elements(){
      return view('adminWebsite.elements');
    }

    public function listings(){
      return view('adminWebsite.listings');
    }

    public function searchListings(Request $req){

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
      session()->flashInput($req->input());
      //return view('adminHome.allProperty', ['property'=> $property]);
      return view('adminWebsite.listings', ['property'=> $property]);
    }

    public function singleBlog(){
      return view('adminWebsite.single-blog');
    }

    public function singleListings(){
      return view('adminWebsite.single-listings');
    }

}
