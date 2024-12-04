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
        Schema::create('strategy_crypto_earnins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('strategy_id');

            $table->decimal('btc');
            $table->decimal('sol');
            $table->decimal('etc');
            $table->decimal('link');
            $table->decimal('eth');
            $table->decimal('ada');
            $table->timestamps();

            $table->foreign('strategy_id')->references('id')->on('strategies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strategy_crypto_earnins');
    }
};
