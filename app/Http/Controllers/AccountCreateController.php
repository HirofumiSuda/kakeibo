<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\UserMast;
use Illuminate\Http\Request;

class AccountCreateController extends Controller
{
    public function create(Request $request){
        
        $input = $request->input();
        $id = $input['account-id'];
        $pass = $input['account-password'];
        $name = $input['account-name'];

        $hashPass = hash('sha256', $pass);

        $now = date('YmdHis');

        $user = UserMast::where('account_id', $id)->get();
        if(count($user) != 0){
            return view('account_create_failuer');
        }

        $familyList = UserMast::select(DB::raw('family'))->groupBy('family')->get();

        UserMast::insert(['account_id' => $id, 'name' => $name, 'password' => $hashPass, 'insert_date' => $now, 'update_date' => $now]);

        return view('account_create_result', compact('familyList', 'id'));
    }
}
