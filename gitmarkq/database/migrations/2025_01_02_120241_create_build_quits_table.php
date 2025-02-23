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
        Schema::create('build_quits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->enum('home_type', ['single_storey', 'double_storey'])->nullable();
            $table->unsignedBigInteger('home_design_id')->nullable();
            $table->unsignedBigInteger('home_plan_id')->nullable()->comment('choose your floor plan');
            $table->unsignedBigInteger('home_style_id')->nullable()->comment('choose home facades');
            $table->unsignedBigInteger('upgrate_type_id')->nullable();
            $table->unsignedBigInteger('upgrate_type_style')->nullable();
            $table->unsignedBigInteger('landscaping_package_id')->nullable();
            $table->unsignedBigInteger('special_offer_id')->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('build_address',255)->nullable();
            $table->string('location',255)->nullable();
            $table->unsignedBigInteger('property_types_id')->nullable();
            $table->longText('remarks')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('build_quits');
    }
};
