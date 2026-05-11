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
    Schema::create('users', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->id();
        $table->string('name')->nullable(); // Boleh dikosongkan
        $table->string('username')->unique(); // Tambahkan ini
        $table->string('email')->nullable()->unique(); // Ubah jadi nullable jika tidak wajib
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->enum('role', ['admin', 'customer'])->default('customer'); // Tambahkan role
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
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
