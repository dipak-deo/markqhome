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
        Schema::create('inclusions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id');
            $table->string('title',255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->json('description')->nullable();
            $table->timestamps();
        });

        Schema::table('build_quits', function(Blueprint $table){
            $table->renameColumn('upgrate_type_style', 'inclusion_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inclusions');
        Schema::table('build_quits', function(Blueprint $table){
           $table->dropColumn('inclusion_id');
        });
    }
};
