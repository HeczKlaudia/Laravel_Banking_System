<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id');
            $table->string('sender_first_name');
            $table->string('sender_last_name');
            $table->text('sender_account');

            $table->integer('receiver_id');
            $table->string('receiver_first_name');
            $table->string('receiver_last_name');
            $table->text('receiver_account');

            $table->text('amount');
            $table->text('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
