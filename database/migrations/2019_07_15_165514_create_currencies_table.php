<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('symbol',20);
            $table->double('usdrate', 10, 2)->nullable();
            $table->string('color',20)->nullable();
            $table->boolean('status');
            $table->double('min', 16, 8);
            $table->double('max', 16, 8);
            $table->boolean('is_fiat');
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
        Schema::dropIfExists('currencies');
    }
}
