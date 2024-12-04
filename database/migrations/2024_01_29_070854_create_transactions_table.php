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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('pay_address')->nullable();
            $table->string('price_amount')->nullable();
            $table->string('price_currency')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('amount_received')->nullable();
            $table->string('pay_currency')->nullable();
            $table->string('order_id')->nullable();
            $table->string('order_description')->nullable();
            $table->string('payin_extra_id')->nullable();
            $table->string('ipn_callback_url')->nullable();
            $table->string('purchase_id')->nullable();
            $table->string('smart_contract')->nullable();
            $table->string('network')->nullable();
            $table->string('network_precision')->nullable();
            $table->string('time_limit')->nullable();
            $table->string('burning_percent')->nullable();
            $table->dateTime('expiration_estimate_date')->nullable();
            $table->boolean('is_fixed_rate')->nullable();
            $table->boolean('is_fee_paid_by_user')->nullable();
            $table->dateTime('valid_until')->nullable();
            $table->string('type')->nullable();
            $table->string('success')->nullable();
            $table->string('invoice_url')->nullable();
            $table->string('success_url')->nullable();
            $table->string('cancel_url')->nullable();
            $table->string('partially_paid_url')->nullable();
            $table->string('payout_currency')->nullable();
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
