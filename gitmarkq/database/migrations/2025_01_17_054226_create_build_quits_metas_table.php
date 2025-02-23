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
        Schema::create('build_quits_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('build_quit_id');
            $table->string('meta_key',255)->nullable();
            $table->longText('meta_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('build_quits_metas');
    }
};
