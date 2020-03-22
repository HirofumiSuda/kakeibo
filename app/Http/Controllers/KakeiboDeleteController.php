<?php

namespace App\Http\Controllers;

use App\Models\KakeiboInfo;
use Illuminate\Http\Request;

class KakeiboDeleteController extends Controller
{
    public function delete(request $request)
    {
        if($request->session()->get('account_id') == null){
            $message = 'ログインしてください。';
            return view('/kakeibo_login', compact('message'));
        }
        $input = $request->input();

        $resultList = [];
        $message = "";
        for ($i = 0; $i < $input['kakeibo_info_list_size']; $i++) {
            if ($input['check_' . $i] == 'checked') {
                KakeiboInfo::where('kakeibo_id', $input['kakeibo_id_' . $i])->delete();
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
        $searchCondition = array('updateDateStart' => $input['updateDateStart'], 'updateDateEnd' => $input['updateDateEnd']);

        return view('kakeibo_delete_result', compact('resultList', 'searchCondition'));
    }
}
