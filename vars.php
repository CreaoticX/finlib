<?php

if (!class_exists('CalcVars')) {

    class CalcVars {

        static $calculators = array(
            'home_affordability' => "Home Affordability Calculator",
            'mortgage_payment' => "Monthly Mortgage Payment Calculator",
            'simple_retirement' => "Simple Retirement Calculator",
            'effective_interest' => 'Effective Interest Equation',
            'future_value' => 'Future Value of Single Sum',
            'future_value_compounded' => 'Future Value With Compounding',
            'future_value_annuity' => 'Future Value of Annuity',
            'future_value_annuity_due' => 'Future Value of Annuity Due',
            'monthly_payment' => 'Monthly Payment',
            'present_value' => 'Present Value of Future Investment',
            'present_value_compounded' => 'Present Value with Compounding',
            'perpetuity' => 'Perpetuity',
        );
        static $calculator_fields = array(
            'home_affordability' => array(
                'tax' => array("label" => "Annual Property Taxes", "type" => "number"),
                'insurance' => array("label" => "Annual Insurance", "type" => "number"),
                'annual_income' => array("label" => "Gross annual income", "type" => "number"),
                'monthly_debt' => array("label" => "Monthly Debt", "type" => "number"),
                'interest' => array("label" => "Mortgage Loan Rate", "type" => "number"),
                'downpayment' => array("label" => "Downpayment Amount", "type" => "number"),
            ),
            'mortgage_payment' => array(
                'years' => array("label" => "Loan term in years", "type" => "number"),
                'interest' => array("label" => "Loan interest", "type" => "number"),
                'loan_amount' => array("label" => "Loan amount", "type" => "number"),
                'annual_tax' => array("label" => "Annual tax", "type" => "number"),
                'annual_insurance' => array("label" => "Annual Insurance", "type" => "number"),
            ),
            'simple_retirement' => array(
                'principal' => array("label" => "Current principal", "type" => "number"),
                'addition' => array("label" => "Pre-retirement addition", "type" => "number"),
                'growyears' => array("label" => "Years to grow", "type" => "number"),
                'rate' => array("label" => "Grow rate", "type" => "number"),
                'pyears' => array("label" => "Years to pay out", "type" => "number"),
                'prate' => array("label" => "Retirement grow rate", "type" => "number"),
            ),
            'effective_interest' => array(
                'nominal_interest' => array('label' => 'Nominal Interest', 'type' => 'number'),
                'compounding_frequency' => array('label' => 'Compounding Frequency', 'type' => 'number'),
                'payments_per_year' => array('label' => 'Payments Per Year', 'type' => 'number'),
            ),
            'future_value' => array(
                'present_value' => array('label' => 'Present Value', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
                'periods' => array('label' => 'Number of Periods', 'type' => 'number'),
            ),
            'future_value_compounded' => array(
                'present_value' => array('label' => 'Present Value', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
                'periods' => array('label' => 'Number of Periods', 'type' => 'number'),
                'compounding_frequency' => array('label' => 'Compounding Frequency', 'type' => 'number'),
            ),
            'future_value_annuity' => array(
                'periodic_payment' => array('label' => 'Periodic Payment', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
                'periods' => array('label' => 'Number of Periods', 'type' => 'number'),
            ),
            'future_value_annuity_due' => array(
                'periodic_payment' => array('label' => 'Periodic Payment', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
                'periods' => array('label' => 'Number of Periods', 'type' => 'number'),
            ),
            'monthly_payment' => array(
                'amount' => array('label' => 'Amount', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
                'periods' => array('label' => 'Number of Periods', 'type' => 'number'),
                'year_or_month' => array('label' => 'Periods Are Monthly', 'type' => 'checkbox'),
                'pay_at_beginning' => array('label' => 'Pay at Beginning of Month', 'type' => 'checkbox'),
            ),
            'present_value' => array(
                'future_value' => array('label' => 'Future Value', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
                'periods' => array('label' => 'Number of Periods', 'type' => 'number'),
            ),
            'present_value_compounded' => array(
                'future_value' => array('label' => 'Future Value', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
                'frequency' => array('label' => 'Compounding Frequency', 'type' => 'number'),
                'periods' => array('label' => 'Number of Periods', 'type' => 'number'),
            ),
            'perpetuity' => array(
                'payment' => array('label' => 'Payment', 'type' => 'number'),
                'interest' => array('label' => 'Interest', 'type' => 'number'),
            ),
        );

    }

}