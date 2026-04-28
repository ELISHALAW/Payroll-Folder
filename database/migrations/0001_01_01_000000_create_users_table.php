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
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('mobile', 20)->nullable();
            $table->string('role', 50)->nullable()->comment('Role 1 is admin, Role 2 is user');
            $table->tinyInteger('status')->nullable();
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
       
        // 1. Disable checks
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('companies');
        Schema::dropIfExists('employees');


        // 2. Drop dependent tables FIRST (Sessions depends on Users)
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');

        // 3. Drop the parent table LAST
        Schema::dropIfExists('users');

        // 4. Re-enable checks
        Schema::enableForeignKeyConstraints();
    }
};
