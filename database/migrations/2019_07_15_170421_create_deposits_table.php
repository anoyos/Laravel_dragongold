<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_id');
            $table->enum('type', ['invest', 'reinvest', 'coupon']);
            $table->string('reference')->nullable();
            $table->string('address')->nullable();
            $table->double('assisted', 16, 8)->nullable();
            $table->integer('confirmations');
            $table->integer('confirmations_needed');
            $table->string('hash')->nullable();
            $table->enum('status', ['active', 'pending', 'canceled', 'confirming']);
            $table->timestamps();
            $table->dateTime('expired_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
