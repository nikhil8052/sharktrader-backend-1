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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('invoice_id')->nullable();
            $table->string('token_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('order_description')->nullable();
            $table->string('price_amount')->nullable();
            $table->string('price_currency')->nullable();
            $table->string('pay_currency')->nullable();
            $table->string('ipn_callback_url')->nullable();
            $table->string('invoice_url')->nullable();
            $table->string('success_url')->nullable();
            $table->string('cancel_url')->nullable();
            $table->string('partially_paid_url')->nullable();
            $table->string('payout_currency')->nullable();
            $table->boolean('is_fixed_rate')->nullable();
            $table->boolean('is_fee_paid_by_user')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
