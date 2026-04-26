<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Service\PayrollService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    protected $payrollService;

    public function __construct(PayrollService $payrollService)
    {
        $this->payrollService = $payrollService;
    }

    public function index()
    {
        $user = Auth::user();
        return view('payroll.payrolls', compact('user'));
    }

    /**
     * Handle Calculation Only
     */
    public function store(Request $request)
    {
        // If someone accidentally triggers a GET, just send them back to the form
        if ($request->isMethod('get')) {
            return redirect()->route('payroll.payrolls');
        }

        // 1. Validation
        $request->validate([
            'basic_salary'   => 'required|numeric|min:0',
            'total_earnings' => 'nullable|numeric|min:0',
        ]);
        $basic = $request->input('basic_salary');
        $allowance = $request->input('total_earning');
        $gross_salary = $basic + $allowance;

        // 2. Perform Math via Service
        $results = $this->payrollService->calculate(
            $request->input('basic_salary'),
            $request->input('total_earnings', 0)
        );

        $results['gross_salary'] = $gross_salary;

        // 3. Redirect back with data
        return redirect()->back()
            ->withInput()
            ->with('payroll', $results);
    }
}
