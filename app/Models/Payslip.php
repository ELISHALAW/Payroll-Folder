<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payslip extends Model
{
    use HasFactory;

    // 指定表名（如果你的表名是 payslips，Laravel 会自动识别，但手动指定更稳妥）
    protected $table = 'payslips';

    /**
     * 允许批量赋值的字段
     */
    protected $fillable = [
        'payroll_id',
        'employee_id',
        'basic_salary',
        'total_earnings',
        'gross_salary',
        'employee_epf',
        'employee_socso',
        'employee_eis',
        'employee_pcb',
        'total_deductions',
        'net_salary',
        'employer_epf',
        'employer_socso',
        'employer_eis',
        'month',
        'year',
        'status',
        'hrdf_amount'
    ];

    /**
     * 建立与 User 或 Employee 的关联
     */
    public function user()
    {
        // 假设 employee_id 关联的是 users 表的 id
        return $this->belongsTo(User::class, 'employee_id');
    }
}