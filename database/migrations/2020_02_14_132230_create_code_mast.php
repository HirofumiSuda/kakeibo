<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeMast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_mast', function (Blueprint $table) {
            $table->text('list_no'); #リスト番号
        	$table->text('code_no'); #コード番号
        	$table->text('name'); #和名
        	$table->text('attribute1')->nullable(); #属性1
        	$table->text('attribute2')->nullable(); #属性2
        	$table->text('attribute3')->nullable(); #属性3
        	$table->text('attribute4')->nullable(); #属性4
        	$table->text('attribute5')->nullable(); #属性5
        	$table->text('attribute6')->nullable(); #属性6
        	$table->text('attribute7')->nullable(); #属性7
        	$table->text('attribute8')->nullable(); #属性8
        	$table->text('attribute9')->nullable(); #属性9
        	$table->text('attribute10')->nullable(); #属性10
        	$table->primary(['list_no', 'code_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_mast');
    }
}
