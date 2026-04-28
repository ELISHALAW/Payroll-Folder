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
            $table->id(); // [cite: 57]

            // Relational keys
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // [cite: 92]
            $table->foreignId('manager_id')->nullable()->constrained('employees')->nullOnDelete()->comment('Reports to');
            $table->foreignId('company_id')->nullable()->constrained()->cascadeOnDelete(); // [cite: 93]
            $table->foreignId('position_id')->nullable()->constrained()->nullOnDelete(); // [cite: 98]
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete(); // [cite: 101]
            $table->unsignedBigInteger('category_id')->nullable(); // [cite: 104]

            // 行政與組織細節 (根據 Kakitangan 截圖新增)
            $table->string('employee_no', 45)->nullable(); // [cite: 112]
            $table->string('cost_center')->nullable();
            $table->string('subsidiary')->nullable();
            $table->string('functional_group')->nullable();
            $table->string('pay_group')->nullable();
            $table->string('location')->nullable();
            $table->integer('notice_period_days')->nullable();

            // 身份與工作許可
            $table->string('ic_number', 12)->unique()->nullable(); // [cite: 110]
            $table->string('work_permit_no', 100)->nullable();
            $table->date('work_permit_expiry')->nullable();
            $table->string('citizenship', 45)->nullable(); // [cite: 116]
            $table->string('gender', 45)->nullable(); // [cite: 140]
            $table->date('date_of_birth')->nullable(); // [cite: 139]
            $table->tinyInteger('is_resident')->nullable(); // [cite: 141]

            // 合約與狀態
            $table->date('join_date')->nullable(); // [cite: 95]
            $table->date('confirmation_date')->nullable();
            $table->date('resignation_date')->nullable(); // [cite: 137]
            $table->date('retirement_date')->nullable();
            $table->string('employment_status', 45)->nullable(); // [cite: 138]
            $table->date('status_effective_from')->nullable();
            $table->date('status_effective_to')->nullable();
            $table->string('salary_type', 45)->nullable(); // [cite: 107]

            // 稅務與公積金 (馬來西亞法規相關)
            $table->string('epf_no', 45)->nullable(); // [cite: 112]
            $table->string('socso_no', 45)->nullable(); // [cite: 114]
            $table->string('tax_no', 45)->nullable(); // [cite: 115]
            $table->string('tax_category', 45)->nullable(); // [cite: 135]
            $table->integer('children_count')->nullable(); // [cite: 136]
            $table->decimal('epf_statutory_rate', 10, 2)->nullable(); // 

            // 特殊稅務計畫 (截圖底部的 Radio Buttons)
            $table->boolean('is_knowledge_worker')->default(false);
            $table->boolean('is_returning_expert')->default(false);

            // 其他
            $table->string('highest_qualification', 50)->nullable(); // [cite: 94]
            $table->timestamps(); // [cite: 143, 144]
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
