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
        Schema::create('statutory_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('statutory_categories')->onDelete('cascade');
            $table->string('type',50);
            $table->decimal('min_salary',10,2)->default(0.00);
            $table->decimal('max_salary',10,2)->default(2500.00);
            $table->decimal('employee_rate',5,4)->nullable();
            $table->decimal('employer_rate',5,4)->nullable();
            $table->decimal('fixed_amount_employee',10,2)->nullable();
            $table->decimal('fixed_amount_employer',10,2)->nullable();
            $table->date('effective_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statutory_rates');
    }
};
