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
        Schema::create('md_product_categories', function (Blueprint $table) {
            $table->id('md_product_category_id');
            $table->string('product_category_code');
            $table->string('product_category_name');
            $table->string('product_category_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_product_categories');
    }
};
