<?php

namespace App\Http\Controllers;

use App\CodeMast;
use Illuminate\Http\Request;

class KakeiboInfoRegistInitController extends Controller
{
    public function init(Request $request){

        $categoryList = CodeMast::select('list_no', 'name')->where('list_no', '0001')->orderBy('code_no')->get();

        return view('kakeibo_regist_input', compact('categoryList'));
    }
}
