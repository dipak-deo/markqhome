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
        Schema::table('property_categories', function (Blueprint $table) {
            $table->string('page_template',255)->nullable()->default('default')->after('slug');
            $table->string('detail_template',255)->nullable()->after('page_template')->default('default');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_categories', function (Blueprint $table) {
            $table->dropColumn(['page_template', 'detail_template']);
        });
    }
};
