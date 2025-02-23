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
        Schema::create('testmonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->string('name',255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('company_logo',255)->nullable();
            $table->string('post', 255)->nullable();
            $table->longText('description')->nullable();
            $table->integer('rating')->nullable()->default(0);
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testmonials');
    }
};
