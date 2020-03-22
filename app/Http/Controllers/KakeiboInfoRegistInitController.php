<?php

namespace App\Http\Controllers;

use App\CodeMast;
use App\UserMast;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KakeiboInfoRegistInitController extends Controller
{
    public function init(Request $request){

        if($request->session()->get('account_id') == null){
            $message = 'ログインしてください。';
            return view('/kakeibo_login', compact('message'));
        }
        $categoryList = CodeMast::select('list_no', 'name')->where('list_no', '0001')->orderBy('code_no')->get();

        $familyList = UserMast::where('family', $request->session()->get('family'))->get();

        $loginUser = $request->session()->get('account_id');
        $loginUserName = $request->session()->get('name');
        $now = date('Y/m/d', );
        $nextMonth = date('Y/m/01', strtotime("1 month"));

        return view('kakeibo_regist_input', compact('categoryList', 'familyList', 'loginUser', 'loginUserName', 'nextMonth', 'now'));
    }
}
