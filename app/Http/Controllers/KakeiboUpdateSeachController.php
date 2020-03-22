<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KakeiboInfo;
use App\CodeMast;

class KakeiboUpdateSeachController extends Controller
{
    public function updateSearch(Request $request)
    {
        if($request->session()->get('account_id') == null){
            $message = 'ログインしてください。';
            return view('/kakeibo_login', compact('message'));
        }
        $input = $request->input();

        #必須チェック
        $required = "";
        if (empty($input['updateDateStart']) || empty($input['updateDateEnd'])) {
            $message = "日付を入力するんだぬん。";
            return view('kakeibo_aggregate_failuer', compact('message'));
        } else {
            #形式チェック
            list($YS, $mS, $dS) = explode('/', $input['updateDateStart']);
            list($YE, $mE, $dE) = explode('/', $input['updateDateEnd']);
            if (checkdate($mS, $dS, $YS) === false || checkdate($mE, $dE, $YE) === false) {
                $message = "存在しない日付だぬん。";
                return view('kakeibo_aggregate_failuer', compact('message'));
            }
        }

        $kakeiboInfoList = KakeiboInfo::whereBetween('buy_date', [$input['updateDateStart'], $input['updateDateEnd']])->get();

        $categoryList = CodeMast::select('list_no', 'name')->where('list_no', '0001')->orderBy('code_no')->get();

        $searchCondition = array('updateDateStart' => $input['updateDateStart'], 'updateDateEnd' => $input['updateDateEnd']);

        return view('kakeibo_update_search_result', compact('kakeiboInfoList', 'categoryList', 'searchCondition'));
    }
}
