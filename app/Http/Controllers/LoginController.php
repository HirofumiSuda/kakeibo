<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMast;

class LoginController extends Controller
{
    public function login(Request $request){
        $input = $request->input();
        $id = $input['id'];
        $password = $input['password'];

        $user = UserMast::where('account_id', $id)->get();
        if(count($user) == 0){
            $message = 'idが誤っています。';
            return view('login_failuer', compact('message'));
        }
        if($user[0]->password !=  hash('sha256', $password)){
            $message = 'パスワードが誤っています。';
            return view('login_failuer', compact('message'));
        }

        $request->session()->put('account_id', $user[0]->account_id);
        $request->session()->put('family', $user[0]->family);
        $request->session()->put('name', $user[0]->name);

        return view('kakeibo_top');
    }
}
