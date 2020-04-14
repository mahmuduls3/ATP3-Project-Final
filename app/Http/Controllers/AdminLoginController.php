<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function index(){
      return view('adminLogin.index');
    }

    public function verify(Request $req){
      $user = DB::table('customer')
                 ->where('username', $req->username)
                 ->where('password', $req->password)
                 ->get();
      if($user){
        $req->session()->put(['username' => $req->username, 'type' => $user[0]->type]);
        //$req->session()->put('user', ['username' => $req->username, 'type' => $user[0]->type]);
        return redirect('/adminHome');
      }else {
        $req->session()->flash('message', 'Invalid username or password');
        return redirect('/adminLogin');
      }
    }
}
