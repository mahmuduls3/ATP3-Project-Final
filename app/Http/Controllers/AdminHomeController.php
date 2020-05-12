<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

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
        $message = DB::table('message')
                    ->where('from', $username)
                    ->get();
        if ($message!=null) {
          return view('adminHome.customerDetail',['customer'=> $customer, 'message'=> $message]);
        }
      }else {
       return redirect('/adminHome');
      }
    }

    public function searchCustomer(Request $req){
      $username = $req->username;
      $name = $req->name;
      $phone = $req->phone;
      $email = $req->email;
      $type = $req->type;
      $orderby = $req->orderby;
      $query = DB::table('customer')->select('customer_id','c_image', 'username', 'name', 'type', 'phone', 'email', 'active_posts', 'pending_posts', 'sold_posts', 'total_posts');
      if($username){
        $query->where(function ($q) use ($username){
          $q->where('username', 'like', "%$username%");
        });
      }
      if($name){
        $query->where(function ($q) use ($name){
          $q->where('name', 'like', "%$name%");
        });
      }
      if($phone){
        $query->where(function ($q) use ($phone){
          $q->where('phone', 'like', "%$phone%");
        });
      }
      if($email){
        $query->where(function ($q) use ($email){
          $q->where('email', 'like', "%$email%");
        });
      }
      if($type){
        $query->where(function ($q) use ($type){
          $q->where('type', '=', "$type");
        });
      }
      if ($orderby) {
        if ($orderby == "active_posts_l_h") {
          $query->orderBy('active_posts', 'asc');
        }
        if ($orderby == "active_posts_h_l") {
          $query->orderBy('active_posts', 'desc');
        }
        if ($orderby == "pending_posts_l_h") {
          $query->orderBy('pending_posts', 'asc');
        }
        if ($orderby == "pending_posts_h_l") {
          $query->orderBy('pending_posts', 'desc');
        }
        if ($orderby == "sold_posts_l_h") {
          $query->orderBy('sold_posts', 'asc');
        }
        if ($orderby == "sold_posts_h_l") {
          $query->orderBy('sold_posts', 'desc');
        }
        if ($orderby == "total_posts_l_h") {
          $query->orderBy('total_posts', 'asc');
        }
        if ($orderby == "total_posts_h_l") {
          $query->orderBy('total_posts', 'desc');
        }
      }
      $customer = $query->get();
      session()->flashInput($req->input());
      //$req->flash();
      return view('adminHome.allCustomer', ['customer'=> $customer]);
    }

    public function propertyDetail($property_id){
      $property = DB::table('property')
                     ->where('property_id', $property_id)
                     ->get()->first();
      if ($property!=null) {
        if ($property->status == 'pending') {
          return view('adminHome.pendingPropertyDetail',['property'=>$property]);
        } else {
          return view('adminHome.propertyDetail',['property'=> $property]);
        }
      }else {
        return redirect('/adminHome');
      }
    }

    public function activePosts($username){
      $property = DB::table('property')
                  ->where('username', $username)
                  ->whereIn('status', ['allowed', 'featured'])
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
      session()->flashInput($req->input());
      //return view('adminHome.allProperty', ['property'=> $property]);

    }

    public function allMessage(){
      $message = DB::table('message')
                    ->select('message_id', 'from', 'to', 'msg', 'msg_date')
                    ->get();
      if ($message!=null) {
        return view('adminHome.allMessage', ['message'=>$message]);
      }
    }

    public function searchMessage(Request $req){
      $from = $req->from;
      $to = $req->to;
      $msg = $req->msg;
      $orderby = $req->orderby;
      $query = DB::table('message')->select('message_id', 'from', 'to', 'msg', 'msg_date');
      if($from){
        $query->where(function ($q) use ($from){
          $q->where('from', 'like', "%$from%");
        });
      }
      if($to){
        $query->where(function ($q) use ($to){
          $q->where('to', 'like', "%$to%");
        });
      }
      if($msg){
        $query->where(function ($q) use ($msg){
          $q->where('msg', 'like', "%$msg%");
        });
      }
      if ($orderby) {
        if ($orderby == "most_recent") {
          $query->orderBy('message_id', 'desc');
        }
        if ($orderby == "most_previous") {
          $query->orderBy('message_id', 'asc');
        }
      }
      $message = $query->get();
      session()->flashInput($req->input());
      return view('adminHome.allMessage', ['message'=> $message]);
    }

    public function addUserIndex(){
      return view('adminHome.addUserIndex');
    }

    public function addUser(Request $req){
        $validation = Validator::make($req->all(), [
          'username'=>'bail|required|unique:customer',
          'password'=>'required|min:4',
          'confirmPassword'=>'required|same:password',
          'type'=>'required',
          'email'=>'required',
          'phone'=>'required',
          'pic'=>'required|image'
        ]);
        if ($validation->fails()) {
          return redirect()->route('adminHome.addUserIndex')
                           ->with('errors', $validation->errors())
                           ->withInput();
        } else {
          $username = $req->username;
          $password = $req->password;
          $confirmPassword = $req->confirmPassword;
          $type = $req->type;
          $email = $req->email;
          $phone = $req->phone;
          $pic = $req->pic;
          if ($req->hasfile('pic')) {
            $file = $req->file('pic');
            //echo "File name: ".$file->getClientOriginalName()."<br>";
            //echo "File Extension: ".$file->getClientOriginalExtension()."<br>";
            //echo "File Size: ".$file->getSize()."<br>";
            //echo "File Mime Type: ".$file->getMimeType()."<br>";

            if ($file->move('users', $username . '.' . $file->getClientOriginalExtension())) {
              $customer = DB::table('customer')
                            ->insert([
                              'username'=>$username,
                              'password'=>$password,
                              'type'=>$type,
                              'email'=>$email,
                              'phone'=>$phone,
                              'c_image'=>$username . '.' . $file->getClientOriginalExtension(),
                              'active_posts'=>0,
                              'pending_posts'=>0,
                              'sold_posts'=>0,
                              'total_posts'=>0
                            ]);
              if ($customer!=null) {
                return redirect('/adminAddUser');
                $req->session()->flash('message', 'Adding user confirmed');
              }else {
                $req->session()->flash('message', 'Adding user not confirmed');
                return redirect()->route('adminHome.addUserIndex');
              }
            } else {
              $req->session()->flash('message', 'File moved not successful');
              return redirect()->route('adminHome.addUserIndex');
            }
          } else {
            $req->session()->flash('message', 'No picture found');
            return redirect()->route('adminHome.addUserIndex');
          }
        }

    }

    public function editUserIndex($username){
      $customer = DB::table('customer')
                     ->select('customer_id', 'c_image', 'username', 'name', 'type', 'email', 'phone')
                     ->where('username', $username)
                     ->get()->first();
      if ($customer) {
        return view('adminHome.editUserIndex', ['customer'=>$customer]);
      }
    }

    public function editUser($username, Request $req){
      $type = $req->type;
      $name = $req->name;
      $email = $req->email;
      $phone = $req->phone;
      $update = [
                  'type'=>$type,
                  'name'=>$name,
                  'email'=> $email,
                  'phone'=>$phone
                ];
      $customer = DB::table('customer')
                    ->where('username', $username)
                    ->update($update);
                    //->update(['type'=>$type, 'name'=>$name, 'email'=> $email, 'phone'=>$phone]);
      if ($customer) {
        return redirect()->route('adminHome.customerDetail', $username);
      } else {
        return redirect()->route('adminHome.index');
      }
    }

    public function feedbackIndex(){
      $message = DB::table('message')
                    ->select('message_id', 'from', 'to', 'msg', 'msg_date')
                    ->where('to', 'admin')
                    ->get();
      if ($message!=null) {
        return view('adminHome.feedback', ['message'=>$message]);
      }
    }

    public function feedback(Request $req){
      $from = $req->from;
      $msg = $req->msg;
      $orderby = $req->orderby;
      $query = DB::table('message')->select('message_id', 'from', 'to', 'msg', 'msg_date')
                                   ->where('to', 'admin');
      if($from){
        $query->where(function ($q) use ($from){
          $q->where('from', 'like', "%$from%");
        });
      }
      if($msg){
        $query->where(function ($q) use ($msg){
          $q->where('msg', 'like', "%$msg%");
        });
      }
      if ($orderby) {
        if ($orderby == "most_recent") {
          $query->orderBy('message_id', 'desc');
        }
        if ($orderby == "most_previous") {
          $query->orderBy('message_id', 'asc');
        }
      }
      $message = $query->get();
      session()->flashInput($req->input());
      return view('adminHome.feedback', ['message'=> $message]);
    }

    public function toFeatured($id){
      $p = DB::table('property')
                     ->where('property_id', $id)
                     ->update(['status'=>'featured']);
      if ($p!=null) {
        $property = DB::table('property')
                       ->where('property_id', $id)
                       ->get()->first();
        if ($property!=null) {
          return view('adminHome.propertyDetail', ['property'=>$property]);
        }else {
          return redirect('/adminHome');
        }
      }else {
        return redirect('/adminHome');
      }
    }

    public function toAllowed($id){
      $p = DB::table('property')
                     ->where('property_id', $id)
                     ->update(['status'=>'allowed']);
      if ($p!=null) {
        $property = DB::table('property')
                       ->where('property_id', $id)
                       ->get()->first();
        if ($property!=null) {
          return view('adminHome.propertyDetail', ['property'=>$property]);
        }else {
          return redirect('/adminHome');
        }
      }else {
        return redirect('/adminHome');
      }
    }

}
