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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('first_name',255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('username', 255)->unique();
            $table->string('email',255)->unique();
            $table->string('phone', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('image', 255)->nullable();
            $table->enum('user_type',['super_admin','admin','user'])->default("user");
            $table->boolean('is_active')->default(1);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->boolean('is_blocked')->default(0);
            $table->boolean('is_online')->default(0);
            $table->string('ip_address')->nullable();
            $table->string('last_login_address')->nullable();
            $table->string('device')->nullable();
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('timezone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
