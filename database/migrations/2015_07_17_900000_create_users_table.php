<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('pin');
            $table->unsignedBigInteger('referrer')->nullable();
            $table->string('mobile')->nullable();
            $table->boolean('status');
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('country_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('referrer')->references('id')->on('users');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
