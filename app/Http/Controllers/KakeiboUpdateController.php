<?php

namespace App\Http\Controllers;

use App\Models\KakeiboInfo;
use Illuminate\Http\Request;

class KakeiboUpdateController extends Controller
{
    public function update(request $request)
    {
        if($request->session()->get('account_id') == null){
            $message = 'ログインしてください。';
            return view('/kakeibo_login', compact('message'));
        }
        $input = $request->input();

        $resultList = [];
        $message = "";
        for ($i = 0; $i < $input['kakeibo_info_list_size']; $i++) {
            $row = $i+1;
            if ($input['check_' . $i] == 'checked') {

                $tmpMessage = "";
                #必須チェック
                $required = "";
                if ($input['buy_date_' . $i] == "") {
                    $required = "購入日";
                }
                if ($input['buy_category_' . $i] == "") {
                    if (!empty($required)) {
                        $required .= "、";
                    }
                    $required .= "カテゴリ";
                }
                if ($input['buy_price_' . $i] == "") {
                    if (!empty($required)) {
                        $required .= "、";
                    }
                    $required .= "金額";
                }
                if(!empty($required)){
                    $tmpMessage = $required . "は必須項目だぬん。(" . $row . "行目だぬん)";
                }
        
                #形式チェック
                if (!empty($input['buy_date_' . $i])) {
                    list($Y, $m, $d) = explode('/', $input['buy_date_' . $i]);
                    if (checkdate($m, $d, $Y) === false) {
                        if(!$tmpMessage == ""){
                            $tmpMessage .= "\n";
                        }
                        $tmpMessage .= "購入日が存在しない日付だぬん。(" . $row . "行目だぬん)";
                    }
                }
                if (!empty($input['buy_price_' . $i])) {
                    $reg = preg_match('/^[0-9]+$/', $input['buy_price_' . $i]);
                    if ($reg != 1) {
                        if(!$tmpMessage == ""){
                            $tmpMessage .= "\n";
                        }
                        $tmpMessage .= "金額は1～9(半角)で入力するぬん。(" . $row . "行目だぬん)";
                    }
                }
                if(!($tmpMessage == "")){
                    if(!$message == ""){
                        $message .= "\n";
                    }
                    $message .= $tmpMessage;
                    continue;
                }

                KakeiboInfo::where('kakeibo_id', $input['kakeibo_id_' . $i])
                    ->update([
                        'buy_date' => $input['buy_date_' . $i],
                        'buy_category' => $input['buy_category_' . $i],
                        'buy_item' => $input['buy_item_' . $i],
                        'buy_price' => $input['buy_price_' . $i],
                        'buy_shop' => $input['buy_shop_' . $i],
                        'buy_remarks' => $input['buy_remarks_' . $i],
                        'update_date' => date('YmdHis')
                    ]);
                $resultList[] = array(
                    'buyDate' => $input['buy_date_' . $i],
                    'buyCategory' => $input['buy_category_' . $i],
                    'buyItem' => $input['buy_item_' . $i],
                    'buyPrice' => $input['buy_price_' . $i],
                    'buyShop' => $input['buy_shop_' . $i],
                    'buyRemarks' => $input['buy_remarks_' . $i]
                );
            }
        }
        if (!empty($message)) {
            $message = nl2br($message, false);
        }

        $searchCondition = array('updateDateStart' => $input['updateDateStart'], 'updateDateEnd' => $input['updateDateEnd']);

        return view('kakeibo_update_result', compact('resultList', 'message', 'searchCondition'));
    }
}
