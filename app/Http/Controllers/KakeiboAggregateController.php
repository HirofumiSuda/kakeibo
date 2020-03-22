<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\KakeiboInfo;

class KakeiboAggregateController extends Controller
{
    public function aggregate(Request $request)
    {
        if($request->session()->get('account_id') == null){
            $message = 'ログインしてください。';
            return view('/kakeibo_login', compact('message'));
        }
        $input = $request->input();

        #必須チェック
        $required = "";
        if (empty($input['aggregateStart']) || empty($input['aggregateEnd'])) {
            $message = "日付を入力するんだぬん。";
            return view('kakeibo_aggregate_failuer', compact('message'));
        } else {
            #形式チェック
                list($YS, $mS, $dS) = explode('/', $input['aggregateStart']);
                list($YE, $mE, $dE) = explode('/', $input['aggregateEnd']);
                if (checkdate($mS, $dS, $YS) === false || checkdate($mE, $dE, $YE) === false) {
                    $message = "存在しない日付だぬん。";
                    return view('kakeibo_aggregate_failuer', compact('message'));
                }
        }

        $kakeiboInfoList = KakeiboInfo::whereBetween('buy_date', [$input['aggregateStart'], $input['aggregateEnd']])->get();

        $kakeiboInfoGroupByCategoryList = KakeiboInfo::select(DB::raw('buy_category, sum(buy_price) as sum_price'))
                                                            ->whereBetween('buy_date', [$input['aggregateStart'], $input['aggregateEnd']])->groupBy('buy_category')->get();

        return view('kakeibo_aggregate_result', compact('kakeiboInfoList', 'kakeiboInfoGroupByCategoryList'));
    }
}
