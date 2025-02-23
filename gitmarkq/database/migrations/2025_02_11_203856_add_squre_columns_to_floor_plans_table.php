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
        Schema::table('floor_plans', function (Blueprint $table) {
            $table->string('area',255)->nullable()->after('price');
            $table->string('beds',255)->nullable()->after('area');
            $table->string('bath',255)->nullable()->after('beds');
            $table->string('garage',255)->nullable()->after('bath');
            $table->string('lot_width',255)->nullable()->after('garage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('floor_plans', function (Blueprint $table) {
            //
        });
    }
};
