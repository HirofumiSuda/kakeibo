<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKakeiboInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kakeibo_info', function (Blueprint $table) {
            $table->increments('kakeibo_id'); #家計簿ID
        	$table->text('buy_date')->nullable(); #購入日
        	$table->text('buy_category')->nullable(); #購入カテゴリ
        	$table->text('buy_item')->nullable(); #購入商品
        	$table->integer('buy_price')->nullable(); #購入金額
        	$table->text('buy_shop')->nullable(); #購入店舗
        	$table->text('buy_remarks')->nullable(); #備考
        	$table->text('insert_date')->nullable(); #登録日時
        	$table->text('update_date')->nullable(); #更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kakeibo_info');
    }
}
