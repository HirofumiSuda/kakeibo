<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKakeiboInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kakeibo_info', function (Blueprint $table) {
            $table->string('credit_flg')->nullable(); #クレジットフラグ
            $table->text('credit_date')->nullable(); #クレジット決済日
            $table->string('buy_user')->nullable(); #購入者
            $table->string('regist_user_name')->nullable(); #登録者
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kakeibo_info', function (Blueprint $table) {
            $table->dropColumn('credit_flg');
            $table->dropColumn('credit_fate');
            $table->dropColumn('buy_user');
            $table->dropColumn('regist_user_name');
        });
    }
}
