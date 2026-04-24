<?php

namespace App\Service;

class PayrollService
{
    public function calculate($basic_salary, $allowance, $pcb = 0)
    {

        $vars = config('payrollVariable');
        $ceiling = $vars['ceiling'];

        $gross_salary = $basic_salary + $allowance;

        $capped_salary = min($gross_salary, $ceiling);

        $epf_employee = $gross_salary * $vars['epf'];
        $epf_employer = ($gross_salary <= 5000) ? ($gross_salary * $vars['epf_employer_low']) : ($gross_salary * $vars['epf_employer_high']);

        $socso_employee = $capped_salary * $vars['socso'];
        $socso_employer = $capped_salary * $vars['socso_employer'];

        $eis_employee = $capped_salary * $vars['eis'];
        $eis_employer = $capped_salary * $vars['eis_employer'];


        $total_deduction = $epf_employee + $socso_employee +  $eis_employee;

        $net_salary = $gross_salary - $total_deduction;

        return [
            'epf_employee' => $epf_employee,
            'epf_employer' => $epf_employer,

            'socso_employee' => $socso_employee,
            'socso_employer' => $socso_employer,

            'eis_employee' => $eis_employee,
            'eis_employer' => $eis_employer,

            'total_deduction' => $total_deduction,
            'net_salary'=> $net_salary
 

         ];
    }
}
