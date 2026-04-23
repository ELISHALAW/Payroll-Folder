<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Create Companies (Parent of everything)
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('registration_no')->comment('SSM Number');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->default('Malaysia');
            $table->string('sst_no')->nullable();
            $table->string('epf_employer_no', 45)->nullable();
            $table->string('socso_employer_no', 45)->nullable();
            $table->string('tax_employer_no', 45)->nullable();
            $table->timestamps();
        });

        // 2. Create Departments
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name', 50)->nullable();
            $table->timestamps();
        });

        // 3. Create Positions
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('level', 50)->nullable();
            $table->timestamps();
        });

        // 4. Create Employees (Depends on all the above)
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->foreignId('position_id')->nullable()->constrained('positions');
            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->foreignId('category_id')->nullable()->constrained('statutory_categories');
            $table->string('employee_no', 45)->nullable();
            $table->date('join_date')->nullable();
            $table->string('Highest_qualification', 50);
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

    public function down(): void
    {
        // Drop in reverse order to respect foreign keys
        Schema::dropIfExists('employees');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('companies');
    }
};
