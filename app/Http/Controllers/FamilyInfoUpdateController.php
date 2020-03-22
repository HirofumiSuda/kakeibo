<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMast;

class FamilyInfoUpdateController extends Controller
{
    public function update(Request $request){
        $input = $request->input();
        $family = $input['regist-family'];
        if(!empty($input['regist-family-new'])){
            $family = $input['regist-family-new'];
        }
        UserMast::where('account_id', $input['account-id'])->update(['family' => $family]);

        return view('account_create_family_regist_result');
    }
}
