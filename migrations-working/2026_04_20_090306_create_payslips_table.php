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
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_id')->nullable()->constrained();
            $table->foreignId('employee_id')->nullable()->constrained();
            $table->decimal('total_earnings', 10, 2)->nullable();
            $table->decimal('employee_epf', 10, 2)->nullable();
            $table->decimal('employee_socso', 10, 2)->nullable();
            $table->decimal('employee_eis', 10, 2)->nullable();
            $table->decimal('employee_pcb', 10, 2)->nullable();
            $table->decimal('total_deductions', 10, 2)->nullable();
            $table->decimal('net_salary', 10, 2)->nullable();
            $table->decimal('employer_epf', 10, 2)->nullable();
            $table->decimal('employer_socso', 10, 2)->nullable();
            $table->decimal('employer_eis', 10, 2)->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->string('status', 45)->nullable();
            $table->decimal('basic_salary', 10, 2)->nullable();
            $table->decimal('hrdf_amount', 10, 2)->nullable();
            $table->decimal('gross_salary', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};
