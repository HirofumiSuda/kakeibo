<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KakeiboInfoRegistController extends Controller
{
    public function regist(Request $request)
    {
        if ($request->session()->get('account_id') == null) {
            $message = 'ログインしてください。';
            return view('/kakeibo_login', compact('message'));
        }
        $input = $request->input();

        $message = "";
        #必須チェック
        $required = "";
        if ($input['buyDate'] == "") {
            $required = "購入日";
        }
        if ($input['buyCategory'] == "") {
            if (!empty($required)) {
                $required .= "、";
            }
            $required .= "カテゴリ";
        }
        if ($input['buyPrice'] == "") {
            if (!empty($required)) {
                $required .= "、";
            }
            $required .= "金額";
        }
        if (!empty($required)) {
            $message = $required . "は必須項目だぬん。";
        }
        #相関チェック
        if ($input['creditFlg'] == 'checked') {
            if (empty($input['creditDate'])) {
                if (!$message == "") {
                    $message .= "\n";
                }
                $message .= "クレジット決済月を入力するぬん。";
            }
        }
        #形式チェック
        if (!empty($input['buyDate'])) {
            list($Y, $m, $d) = explode('/', $input['buyDate']);
            if (checkdate($m, $d, $Y) === false) {
                if (!$message == "") {
                    $message .= "\n";
                }
                $message .= "購入日が存在しない日付だぬん。";
            }
        }
        if (!empty($input['buyPrice'])) {
            $reg = preg_match('/^[0-9]+$/', $input['buyPrice']);
            if ($reg != 1) {
                if (!$message == "") {
                    $message .= "\n";
                }
                $message .= "金額は1～9(半角)で入力するぬん。";
            }
        }
        if (!empty($message)) {
            $message = nl2br($message, false);
            return view('kakeibo_regist_failuer', compact('message'));
        }

        $creditFlg = '0';
        $creditDate = '';
        if ($input['creditFlg'] == 'checked') {
            $creditFlg = '1';
            $creditDate = $input['creditDate'];
        }

        #登録処理
        DB::transaction(function () use ($input, $creditFlg, $creditDate) {
            $now = date('YmdHis');
            DB::table('kakeibo_info')->insert(
                [
                    'buy_date' => $input['buyDate'],
                    'buy_category' => $input['buyCategory'],
                    'buy_item' => $input['buyItem'],
                    'buy_price' => $input['buyPrice'],
                    'buy_shop' => $input['buyShop'],
                    'buy_remarks' => $input['buyRemarks'],
                    'insert_date' => $now,
                    'update_date' => $now,
                    'credit_flg' => $creditFlg,
                    'credit_date' => $creditDate,
                    'buy_user' => $input['buyUser'],
                    'regist_user_name' => $input['registUserId']
                ]
            );
        });

        return view('kakeibo_regist_result');
    }
}
