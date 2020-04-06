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
        if ($user[0]->type == 'admin') {
          $req->session()->put('username', $req->username);
          return redirect('/adminHome');
        } else {
          echo "User is not admin type";
        }
      }else {
        $req->session()->flash('message', 'Invalid username or password');
        return redirect('/adminLogin');
      }
    }
}
