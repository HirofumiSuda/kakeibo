<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_id');
            $table->string('name');
            $table->string('password');
            $table->string('family')->nullable();
        	$table->text('insert_date')->nullable();
        	$table->text('update_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_mast');
    }
}
