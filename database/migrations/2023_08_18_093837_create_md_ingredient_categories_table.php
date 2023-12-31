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
        Schema::create('md_ingredient_categories', function (Blueprint $table) {
            $table->id('md_ingredient_category_id');
            $table->string('name');
            $table->integer('parent_category_id')->nullable();
            $table->integer('count')->nullable();
            $table->integer('qr_menu_count')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('md_ingredient_categories');
    }
};
