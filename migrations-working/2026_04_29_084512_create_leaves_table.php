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
        Schema::create('leave_policies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('min_years');
            $table->integer('max_years');
            $table->decimal('days_allowed', 5, 2);
            $table->timestamps();
        });

        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('leave_policy_id')->constrained()->onDelete('cascade');
            $table->string('leave_type', 50)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('total_days', 4, 2)->nullable();
            $table->boolean('is_paid')->default(true);
            $table->string('status', 45)->nullable();
            $table->text('reason')->nullable();
            $table->timestamps();
        });



        Schema::create('leave_balance_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('leave_policy_id')->constrained()->onDelete('cascade');
            $table->foreignId('reference_id')->constrained('leaves')->onDelete('cascade');
            $table->string('transaction_type', 45);
            $table->decimal('amount', 5, 2);
            $table->string('description', 255);
            $table->timestamps();
        });



        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('leave_policy_id')->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_days', 5, 3);
            $table->tinyInteger('is_half_day');
            $table->string('half_day_session', 10);
            $table->text('reason');
            $table->string('status', 255);
            $table->string('attachment_path', 255);
            $table->datetime('applied_at');
            $table->timestamps();
        });

        Schema::create('leave_entitlements', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained()->onDelete('cascade');
            $table->foreignId("leave_policy_id")->constrained()->onDelete('cascade');
            $table->smallInteger('year');
            $table->decimal('total_entitled', 10, 2);
            $table->decimal('carried_forward', 10, 2);
            $table->decimal('taken_days', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->timestamps();
        });

        Schema::create('leave_calender_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_application_id')->contraiied()->onDelete('cascade');
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->date('event_date');
            $table->tinyInteger('is_half_session');
            $table->string('event_type', 50);
            $table->string('status', 20);
            $table->timestamps();
        });

        Schema::create('leave_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_application_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('level');
            $table->string('status', 50);
            $table->text('remarks');
            $table->dateTime('actioned_at');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_approvals');
        Schema::dropIfExists('leave_calender_events');
        Schema::dropIfExists('leave_entitlements');
        Schema::dropIfExists('leave_applications');
        Schema::dropIfExists('leave_balance_transactions');
        Schema::dropIfExists('leaves');
        Schema::dropIfExists('leave_policies');
    }
};
