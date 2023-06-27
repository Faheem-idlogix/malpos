<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('td_payment_details', function (Blueprint $table) {
            $table->id('td_payment_detail_id');
            $table->string('tender_type');
            $table->string('payment_amount');
            $table->foreignId('cd_client_id')->on('cd_clients');
            $table->foreignId('cd_brand_id')->on('cd_brands');
            $table->foreignId('cd_branch_id')->on('cd_branchs');
            $table->foreignId('td_sale_order_id')->on('td_sale_orders');
            $table->string('account_name');
            $table->string('routing_number');
            $table->string('check_number');
            $table->string('account_number');
            $table->date('date_promised');
            $table->string('credit_card');
            $table->string('credit_card_number');
            $table->boolean('is_active');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('td_payment_details');
    }
};
