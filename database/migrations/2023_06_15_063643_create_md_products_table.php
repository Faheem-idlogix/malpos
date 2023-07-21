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
        Schema::create('md_products', function (Blueprint $table) {
            $table->id('md_product_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_image');
            $table->foreignId('md_product_category_id')->on('md_product_categories');
            $table->foreignId('td_tax_category_id')->on('td_tax_categories');
            $table->foreignId('cd_client_id')->on('cd_clients');
            $table->foreignId('cd_brand_id')->on('cd_brands');
            $table->foreignId('cd_branch_id')->on('cd_branchs');
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
        Schema::dropIfExists('md_products');
    }
};
