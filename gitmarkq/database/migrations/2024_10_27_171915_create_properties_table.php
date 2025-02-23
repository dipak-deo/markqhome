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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('property_type_id')->nullable();
            $table->string('title',255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->double('price')->nullable();
            $table->longText('description')->nullable();
            $table->json('gallery')->nullable();
            $table->json('additional_image')->nullable();
            $table->json('floor_plan')->nullable();
            $table->json('additional_data')->nullable();
            $table->json('property_meta')->nullable();
            $table->text('map_ifreme')->nullable();
            $table->integer('agent_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address_line_one')->nullable();
            $table->string('address_line_two')->nullable();
            $table->string('zip_code')->nullable();
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
