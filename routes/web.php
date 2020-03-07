<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Top画面
Route::get('/kakeibo_top', function () {
    return view('kakeibo_top');
});
#登録画面初期化処理
Route::get('/kakeibo_regist_input_init', 'KakeiboInfoRegistInitController@init');
#登録画面
Route::get('/kakeibo_regist_input', function () {
    return view('kakeibo_regist_input');
});
#集計画面
Route::get('/kakeibo_aggregate', function () {
    return view('kakeibo_aggregate');
});

#登録処理
Route::post('/kakeibo_regist', 'KakeiboInfoRegistController@regist');
#集計処理
Route::post('/kakeibo_aggregate_result', 'KakeiboAggregateController@aggregate');
#家計簿情報修正検索
Route::get('/kakeibo_update_search', function () {
    return view('kakeibo_update_search');
});
#家計簿情報修正入力
Route::post('/kakeibo_update_input', 'KakeiboUpdateSeachController@updateSearch');
#家計簿情報修正
Route::post('/kakeibo_update', 'KakeiboUpdateController@update');
#家計簿情報削除
Route::post('/kakeibo_delete', 'KakeiboDeleteController@delete');