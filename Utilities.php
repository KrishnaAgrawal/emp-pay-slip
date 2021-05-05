<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilities
 *
 * @author login
 */
class Utilities {
    /*
     * calculate income tax as per income
     */
    public function calculateIncomeTax($annualSalary) {
        $incomeTax = 0;
        if($annualSalary > 18200 && $annualSalary <= 37000){
            $incomeTax = ($annualSalary-18200)*0.19;
        }
        if($annualSalary > 37000 && $annualSalary <= 87000){
            $incomeTax = 3572 + ($annualSalary-37000)*0.325;
        }
        if($annualSalary > 87000 && $annualSalary <= 180000){
            $incomeTax = 19822 + ($annualSalary-87000)*0.37;
        }
        if($annualSalary > 180000){
            $incomeTax = 54232 + ($annualSalary-180000)*0.45;
        }
        return round($incomeTax/12);
    }
}
