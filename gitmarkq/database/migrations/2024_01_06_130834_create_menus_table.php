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
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->string('redirect_url',255)->nullable()->default('#');
            $table->unsignedBigInteger('order')->nullable();
            $table->unsignedBigInteger('block_number')->nullable();
            $table->string('location',255)->nullable();
            $table->enum('status',['publish','draft'])->nullable()->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
