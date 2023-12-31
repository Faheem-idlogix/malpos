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
        Schema::create('cd_branches', function (Blueprint $table) {
            $table->id('cd_branch_id');
            $table->string('name');
            $table->foreignId('cd_brand_id')->on('cd_brands');
            $table->foreignId('gd_region_id')->on('gd_regions');
            $table->foreignId('gd_country_id')->on('gd_countries');
            $table->foreignId('td_currency_id')->on('td_currencies');
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
        Schema::dropIfExists('cd_branches');
    }
};
