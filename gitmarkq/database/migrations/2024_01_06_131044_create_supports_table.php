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
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title',255)->nullable();
            $table->string('file',255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('reply')->nullable();
            $table->string('priority',255)->default('low');
            $table->longText('remarks')->nullable();
            $table->string('status',255)->default('closed');
            $table->boolean('is_viewed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
