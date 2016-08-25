<?php
// array of available calculators
$calculators = array(
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

$calculator_fields = array(
	'home_affordability' => array(
                'tax'=>array("label"=>"Annual Property Taxes", "type"=>"text"), 
                'insurance'=>array("label"=>"Annual Insurance", "type"=>"text"),
                'annual_income'=>array("label"=>"Gross annual income", "type"=>"text"),
                'monthly_debt'=>array("label"=>"Monthly Debt", "type"=>"text"),
                'interest'=>array("label"=>"Mortgage Loan Rate", "type"=>"text"),
                'downpayment'=>array("label"=>"Downpayment Amount", "type"=>"text"),
		),
	'mortgage_payment' => array(
		'years'=>array("label"=>"Loan term in years", "type"=>"text"),
		'interest'=>array("label"=>"Loan interest", "type"=>"text"),
		'loan_amount'=>array("label"=>"Loan amount", "type"=>"text"),
		'annual_tax'=>array("label"=>"Annual tax", "type"=>"text"),
		'annual_insurance'=>array("label"=>"Annual Insurance", "type"=>"text"),
	 ),
	'simple_retirement' => array(
		'principal'=>array("label"=>"Current principal", "type"=>"text"),
		'addition'=>array("label"=>"Pre-retirement addition", "type"=>"text"),
		'growyears'=>array("label"=>"Years to grow", "type"=>"text"),
		'rate'=>array("label"=>"Grow rate", "type"=>"text"),
		'pyears'=>array("label"=>"Years to pay out", "type"=>"text"),
		'prate'=>array("label"=>"Retirement grow rate", "type"=>"text"),
	),
	'effective_interest' => array(
		'nominal_interest'=> array('label' => 'Nominal Interest', 'type' => 'Text'),
		'compounding_frequency'=> array('label' => 'Compounding Frequency', 'type' => 'Text'),
		'payments_per_year'=> array('label' => 'Payments Per Year', 'type' => 'Text'),
	), 
	
	'future_value' => array(
		'present_value'=> array('label' => 'Present Value', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),
		'periods'=> array('label' => 'Number of Periods', 'type' => 'Text'),
	), 
	
	'future_value_compounded' => array(
		'present_value'=> array('label' => 'Present Value', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),
		'periods'=> array('label' => 'Number of Periods', 'type' => 'Text'),
		'compounding_frequency'=> array('label' => 'Compounding Frequency', 'type' => 'Text'),		
	),
	
	'future_value_annuity' => array(
		'periodic_payment'=> array('label' => 'Periodic Payment', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),
		'periods'=> array('label' => 'Number of Periods', 'type' => 'Text'),		
	),
	
	'future_value_annuity_due' => array(
		'periodic_payment'=> array('label' => 'Periodic Payment', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),
		'periods'=> array('label' => 'Number of Periods', 'type' => 'Text'),		
	),
	
	'monthly_payment' => array(
		'amount'=> array('label' => 'Amount', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),
		'periods'=> array('label' => 'Number of Periods', 'type' => 'Text'),		
		'year_or_month'=> array('label' => 'Periods Are Monthly', 'type' => 'Boolean'),		
		'pay_at_beginning'=> array('label' => 'Pay at Beginning of Month', 'type' => 'Boolean'),		
	),
	
	'present_value' => array(
		'future_value'=> array('label' => 'Future Value', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),
		'periods'=> array('label' => 'Number of Periods', 'type' => 'Text'),		
	),
	
	'present_value_compounded' => array(
		'future_value'=> array('label' => 'Future Value', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),
		'frequency'=> array('label' => 'Compounding Frequency', 'type' => 'Text'),
		'periods'=> array('label' => 'Number of Periods', 'type' => 'Text'),		
	),
	
	'perpetuity' => array(
		'payment'=> array('label' => 'Payment', 'type' => 'Text'),
		'interest'=> array('label' => 'Interest', 'type' => 'Text'),		
	),
);
