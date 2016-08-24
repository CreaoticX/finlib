<?php

// financial equations
class Equator {
	// use the constructor to add some basic setting
	// like format of returned values, number format, 
	// whether to show default currency etc 
	function __construct() {
		// NYI
	}
	
	// calculate effective interest rate
	function effective_interest($input) {
		$x = 1 + $input['nominal_interest'] / (100 * $input['compounding_frequency']);		
		$y = $input['compounding_frequency'] / $input['payments_per_year'];
		
		$interest = ( pow($x, $y) - 1 ) * 100;			
		return $interest;				
	}
	
	// future value of single sum
	function future_value($input) {
		return ( $input['present_value'] * pow(1 + $input['interest']/100, $input['periods']) );
	}
	
	// future value with compounding
	function future_value_compounded($input) {
		return ( $input['present_value'] * pow(1 + ($input['interest'] / 100) / $input['compounding_frequency'], $input['periods'] - $input['compounding_frequency']) );
	}
	
	// future value of annuity
	function future_value_annuity($input) {
		$future_value = $input['periodic_payment'] * ( (pow(1 + $input['interest'] / 100, $input['periods']) -1) / $input['interest'] );
		return $future_value;
	}
	
	// future value of annuity due
	function future_value_annuity_due($input) {
		$future_value = $input['periodic_payment'] * ( (pow(1 + $input['interest'] / 100, $input['periods']) -1) / $input['interest'] ) * ($input['interest'] + 1);
		return $future_value;
	}

	
	// monthly payment
	function monthly_payment($input) {
		$x = $input['interest'] * pow(1 + $input['interest'] / 100, $input['periods']);
		$y = pow(1 + $input['interest'], $input['periods']) - 1;
		
		return $input['amount'] * ($x / $y);
	}
	
	// present value of investment made in the future
	function present_value($input) {
		 $present_value = $input['future_value'] / pow( (1 + $input['interest'] / 100), $input['periods']);
		 return $present_value;	
	}
	
	// present value with compounding
	function present_value_compounded($input) {
		 $present_value = $input['future_value'] / ( (1 + $input['interest'] / 100 /$frequency) * ($input['periods'] - $frequency) ); 
		 return $present_value;	
	}
	
	// perpetuity
	function perpetuity($input) {
		 return $input['payment'] / $input['interest'] / 100;
	}	
	
	// expected rate of return
	// accepts array of arrays ((probability, ROI), (probability, ROI)...)
	function ERR($vals) {
		 $err = 0;
		 foreach($vals as $val) {
		 		$err += $val[0] * $val[1];	
		 }	
		 
		 return $err;
	}
}