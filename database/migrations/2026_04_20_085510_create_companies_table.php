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
        // 1. Create Companies (Parent)
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // BIGINT
            $table->string('name')->nullable();
            $table->string('registration_no')->comment('SSM Number');

            // Location Details
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->default('Malaysia');

            // Tax & Business IDs
            $table->string('sst_no')->nullable();

            // Malaysian Statutory Employer Numbers
            $table->string('epf_employer_no', 45)->nullable();
            $table->string('socso_employer_no', 45)->nullable();
            $table->string('tax_employer_no', 45)->nullable();

            // Standard Timestamps (handles created_at and updated_at)
            $table->timestamps();
        });

        // 2. Create Departments (Parent of employees)
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name', 50)->nullable();
            $table->timestamps();
        });

        // 3. Create Positions (Parent of employees)
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('level', 50)->nullable();
            $table->timestamps();
        });

        // 4. NOW Create Employees (Child)
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->foreignId('position_id')->nullable()->constrained('positions'); // positions table must exist!
            $table->foreignId('department_id')->nullable()->constrained('departments'); // departments table must exist!

            $table->string('employee_no', 45)->nullable();
            $table->date('join_date')->nullable();
            $table->string('salary_type', 45)->nullable();
            $table->string('ic_number', 12)->unique()->nullable();
            $table->string('epf_no', 45)->nullable();
            $table->string('socso_no', 45)->nullable();
            $table->string('tax_no', 45)->nullable();
            $table->string('citizenship', 45)->nullable();
            $table->string('tax_category', 45)->nullable();
            $table->integer('children_count')->nullable();
            $table->date('resignation_date')->nullable();
            $table->string('employment_status', 45)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 45)->nullable();
            $table->tinyInteger('is_resident')->nullable();
            $table->decimal('epf_statutory_rate', 10, 2)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
