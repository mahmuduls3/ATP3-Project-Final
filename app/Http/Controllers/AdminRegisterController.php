<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRegisterController extends Controller
{
    public function index(){
      return view('adminRegister.index');
    }

    public function verify(Request $req){
      $user = DB::table('customer')
                 ->where('username', $req->username)
                 ->get();
      if($user!=null){
        return redirect('/adminRegister');
      }else {
        $username = $req->username;
        $password = $req->password;
        $confirmPassword = $req->confirmPassword;
        $email = $req->email;
        $phone = $req->phone;
        if ($password != $confirmPassword) {
          return redirect('/adminRegister');
        } else {
          $customer = DB::table('customer')
                        ->insert([
                          'username'=>$username,
                          'password'=>$password,
                          'type'=>'customer',
                          'email'=>$email,
                          'phone'=>$phone,
                          'c_image'=>$username,
                          'active_posts'=>0,
                          'pending_posts'=>0,
                          'sold_posts'=>0,
                          'total_posts'=>0
                        ]);
          if ($customer!=null) {
            return redirect('/adminRegister');
            $req->session()->flash('message', 'Registration confirmed');
          }else {
            echo "Registration not confirmed";
          }
        }
      }
    }
}
