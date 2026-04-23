<?php

namespace App\Service;

class PayrollService
{
    public function calculate($basic_salary, $allowance, $pcb = 0) {

        $vars = config('payrollVariable');
        $ceiling = $vars['ceiling'];

        $gross_salary = $basic_salary + $allowance;
    }
}
