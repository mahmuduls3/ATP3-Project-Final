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
                 ->where([
                      ['username', '=', $req->username],
                      ['password', '=', $req->password],
                   ])
                 ->get()->first();
      if($user!=null){
        $req->session()->put(['username' => $req->username, 'type' => $user->type]);
        //$req->session()->put('user', ['username' => $req->username, 'type' => $user[0]->type]);
        return redirect('/adminHome');
      }else {
        $req->session()->flash('message', 'Invalid username or password');
        return redirect('/adminLogin');
      }
    }
}
