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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type',255)->default('default')->nullable();
            $table->string('name',255)->nullable();
            $table->text('subject')->default('{{$site_title}} System')->nullable();
            $table->longText('message')->default('Hello {{$first_name}}, <br> Thank you for connecting us. Please visit {{$site_url}} for latest update. <br>Regards,<br>{{$site_title}},')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};
