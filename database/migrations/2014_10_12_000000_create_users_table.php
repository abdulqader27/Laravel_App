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
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('Admin')->default('0');
            $table->string('Country')->default('Private');
            $table->string('Birthday')->default('Private');
            $table->string('Gender')->default('Private');
            $table->string('City')->default('Private');
            $table->string('work')->default('Private');
            $table->string('Wisdom')->nullable();
            $table->string('ProfilePhoto')->default('users/male-user-profile-picture_318-37825.avif');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
