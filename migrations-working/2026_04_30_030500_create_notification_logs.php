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
        Schema::create('notification_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type', 50);
            $table->string('channel', 50);
            $table->string('recipient', 100);
            $table->string('status', 100);
            $table->text('error_message')->nullable(); // FIX: Added nullable
            $table->datetime('sent_at');
            $table->timestamps();
        });

        Schema::create('position', function (Blueprint $table) { // Changed to plural
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title', 50);
            $table->string('level', 50);
            $table->timestamps();
        });

        Schema::create('employee_tax_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('bank_account_id')->constrained()->onDelete('cascade');
            $table->string("payment_method", 255);
            $table->boolean('is_tax_resident')->default(true);
            $table->boolean('epf_contributor')->default(true);
            $table->string('socso_type', 50);
            $table->boolean('eis_contributor')->default(true);
            $table->boolean('hrdf_contributor')->default(true);
            $table->string('tax_category', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // FIX: Drop all tables in reverse order
        Schema::dropIfExists('employee_tax_profiles');
        Schema::dropIfExists('overtimes');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('notification_logs');
    }
};
