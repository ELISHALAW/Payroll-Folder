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
            $table->string('logo')->nullable(); // Removed ->after()
            $table->string('registration_no')->comment('SSM Number');
            $table->string('phone_no')->nullable(); // Removed ->after()
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

        Schema::create('salary_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->decimal('basic_salary', 10, 2)->nullable();
            $table->string('payment_type', 45)->nullable();
            $table->dateTime('effective_date')->nullable();
            $table->timestamps();
        });

        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->integer('month')->nullable();
            $table->smallInteger('year')->nullable();
            $table->string('status', 45)->nullable(); // draft/approved/paid
            $table->timestamps();
        });

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


        Schema::create('allowances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name', 50)->nullable();
            $table->boolean('is_taxable')->default(true);
            $table->timestamps();
        });
        Schema::create('employee_allowances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('allowance_id')->constrained();
            $table->decimal('amount', 10, 2)->nullable();
            $table->boolean('is_fixed')->default(true);
            $table->timestamps();
        });

        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('name');
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('employee_deductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('deduction_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2)->nullable();
            $table->boolean('is_fixed')->default(true);
            $table->timestamps();
        });

        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->dateTime('date')->nullable();
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
            $table->string('status', 45)->nullable();
            $table->timestamps();
        });

        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->string('bank_name')->nullable();
            $table->string('account_number', 50)->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('swift_code', 11)->nullable();
            $table->boolean('is_primary')->default(true);
            $table->timestamps();
        });

        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->date('date')->nullable();
            $table->decimal('hours', 4, 2)->nullable();
            $table->decimal('rate_multiplier', 3, 2)->nullable();
            $table->string('status', 45)->nullable();
            $table->timestamps();
        });

        Schema::create('employee_permanent_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('address', 500);
            $table->string('city', 255);
            $table->string('postcode', 20);
            $table->string('region', 255);
            $table->string('country', 255)->default('Malaysia');
            $table->timestamps();
        });

        Schema::create('employee_correspondence_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('address', 500);
            $table->string('city', 255);
            $table->string('postcode', 20);
            $table->string('region', 255);
            $table->string('country', 255)->default('Malaysia');
            $table->timestamps();
        });
        Schema::create('employee_emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('full_name', 50);
            $table->string('phone_number', 50);
            $table->string('relationship', 50);
            $table->timestamps();
        });

        Schema::create('statutory_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->text('description');
            $table->timestamps();
        });



        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

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
            $table->foreignId('leave_application_id')->constrained()->onDelete('cascade');
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

        Schema::create('statutory_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('statutory_categories')->onDelete('cascade');
            $table->string('rule_type', 40);
            $table->decimal('min_salary', 12, 2);
            $table->decimal('max_salary', 12, 2);
            $table->decimal('employer_rate', 8, 4);
            $table->decimal('fixed_amount_employer', 12, 2);
            $table->date('effective_date');
            $table->timestamps();
        });



        Schema::create('statutory_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('statutory_categories')->onDelete('cascade');
            $table->string('type', 50);
            $table->decimal('min_salary', 10, 2)->default(0.00);
            $table->decimal('max_salary', 10, 2)->default(2500.00);
            $table->decimal('employee_rate', 5, 4)->nullable();
            $table->decimal('employer_rate', 5, 4)->nullable();
            $table->decimal('fixed_amount_employee', 10, 2)->nullable();
            $table->decimal('fixed_amount_employer', 10, 2)->nullable();
            $table->date('effective_date');

            $table->timestamps();
        });

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

        Schema::create('payslip_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payslip_id')->constrained()->onDelete('cascade');
            $table->string('type', 50);
            $table->string('name', 45);
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });

        Schema::create('bank_payment_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('bank_account_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('batch_reference', 50);
            $table->decimal('total_amount', 10, 2);
            $table->integer('total_records');
            $table->date('payment_date');
            $table->string('status', 50);
            $table->string('file_path', 255);
            $table->timestamps();
        });

        Schema::create('working_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('day_of_week', 45);
            $table->string('type', 45);
            $table->tinyInteger('is_public_holiday_off');
            $table->timestamps();
        });

        Schema::create('public_holidays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->datetime('holiday_date');
            $table->string('name', 45);
            $table->string('state', 100);
            $table->tinyInteger('is_recurring');
            $table->timestamps();
        });

        Schema::create('employee_terminations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('termination_type', 40);
            $table->date('last_working_date');
            $table->tinyInteger('notice_period_met');
            $table->text('reason');
            $table->string('settlement_status', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // 1. Disable foreign key constraints so we can drop tables in any order
        Schema::disableForeignKeyConstraints();

        // 2. Drop all tables created in the up() method
        Schema::dropIfExists('bank_payment_batch_items');

        Schema::dropIfExists('working_days');
        Schema::dropIfExists('bank_payment_batches');
        Schema::dropIfExists('payslips_item');
        Schema::dropIfExists('employee_tax_profiles');
        Schema::dropIfExists('leave_approvals');
        Schema::dropIfExists('leave_calender_events');
        Schema::dropIfExists('leave_entitlements');
        Schema::dropIfExists('leave_applications');
        Schema::dropIfExists('leave_balance_transactions');
        Schema::dropIfExists('leaves');
        Schema::dropIfExists('leave_policies');
        Schema::dropIfExists('statutory_rules');
        Schema::dropIfExists('statutory_rates');
        Schema::dropIfExists('notification_logs');
        Schema::dropIfExists('claims');
        Schema::dropIfExists('statutory_categories');
        Schema::dropIfExists('employee_emergency_contacts');
        Schema::dropIfExists('employee_correspondence_addresses');
        Schema::dropIfExists('employee_permanent_addresses');
        Schema::dropIfExists('overtimes');
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('employee_deductions');
        Schema::dropIfExists('deductions');
        Schema::dropIfExists('employee_allowances');
        Schema::dropIfExists('allowances');
        Schema::dropIfExists('payslips');
        Schema::dropIfExists('payrolls');
        Schema::dropIfExists('salary_structures');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('companies');

        // 3. Re-enable foreign key constraints
        Schema::enableForeignKeyConstraints();
    }
};
