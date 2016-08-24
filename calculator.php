<?php
// various financial calculators
// unlike the strict financial equations in Equator these use some assumptions based on real life practices
class Calculator {
	function __construct() {
		// this will probably accept some settings where a visible calculator should be displayed
		// and with what design
	}
	
	// Home affordability calculator
	// requires the following $input array:
	// "tax" : Annual property taxes
	// "insurance" : Annual insurance
	// "income_per_period" : Gross annual income
	// "monthly_debt" : Monthly debt 
	// "interest" : Mortgage loan rate
	// "downpayment": Downpayment amount
	// Output array explanation:
	// "min_price" : Minimum house price (conservative)
	// "max_price" : Minimum house price (aggressive)
	// "min_loan" : Loan amount (conservative)
	// "max_loan" : Loan amount (aggressive)
	// "min_payment" : Monthly mortgage payment (conservative)
	// "max_payment" : Monthly mortgage payment (aggressive)
	// "taxes_and_insurance" : Taxes and insurance
	// "min_total" : Total monthly payment (conservative)
	// "max_total" : Total monthly payment (aggressive)
	static function home_affordability($input) {
		// assume
		$min_pti = 0.28;
		$max_pti = 0.33;
		$loan_life = 30;
		$frequency = 12;
		$min_dti = 0.36;
		$max_dti = 0.38;
		$periods = $loan_life * $frequency;		
		
		// taxes and insurance per period
		$taxes = ($input['tax'] + $input['insurance']) / $frequency;
		$periodic_income = $input['annual_income'] / $frequency;
		
		 // lower level monthly payment
		 $min_total = $periodic_income * $min_pti;
		 $positive = $periodic_income * $min_dti - $input['monthly_debt']; 
		 
		 if($positive < $min_total) {
		 		$min_limit = "debt";
		 		$min_total = $positive;
		 } else $min_limit = "income";
		 
		 // upper level monthly payment
		 $max_total = $periodic_income * $max_pti;
		 $positive = $periodic_income * $max_dti - $input['monthly_debt'];
		 if($positive < $max_total) {
		 		$max_limit = "debt";
		 		$max_total = $positive;
		 } else $max_limit = "income";
		 
		 // get min and max loan bank will give
		 $min_pmt = $min_total - $taxes;
		 $max_pmt = $max_total - $taxes;
		 $period_interest = $input['interest'] / ($frequency * 100); 
		 $discount_f = (pow(1 + $period_interest, $periods) - 1) 
		 	/ ($period_interest * pow(1 + $period_interest, $periods) );
		 	
		 $min_loan = $min_pmt * $discount_f;	 
		 $max_loan = $max_pmt * $discount_f;
		 $min_price = $min_loan + $input['downpayment'];
		 $max_price = $max_loan + $input['downpayment'];
		 
		 // return result array
		 return array( "min_price" => $min_price, "min_loan" => $min_loan, "min_payment" => $min_pmt,
		 	"taxes_and_insurance"=> $taxes, "min_total" => $min_total, "min_limit" => $min_limit,
		 	"max_price" => $max_price, "max_loan" => $max_loan, "max_payment" => $max_pmt, 
		 	"max_total" => $max_total, "max_limit" => $max_limit);		 
	} // end home_affordability
	
		
	// monthly mortgage payment calculator
	// requires the following $input array:
	// "years" - loan term in years
	// "interest" - loan interest
	// "loan_amount" - loan amount
	// "annual_tax" - anual tax
	// "annual_insurance" - annual insurance
	// Returns array:
	// "monthly_principal" - Monthly Principal + Interest
	// "monthly_tax" - Monthly tax
	// "monthly_insurance" - Monthly insurance
	// "total" - Total monthly payment
	static function mortgage_payment($input) {
		$mi = $input['interest'] / 1200;
		$base = 1;
		$mbase = 1 + $mi;
		for($i=0; $i < $input['years'] * 12; $i++) {
			$base = $base * $mbase;
		}	
		
		$principal = $input['loan_amount'] * $mi / (1 - 1/$base);
		$monthly_tax = $input['annual_tax']/12;
		$monthly_insurance = $input['annual_insurance']/12;
		
		$total = $principal + $monthly_tax + $monthly_insurance;
		
		return array("monthly_principal" => $principal, "monthly_tax" => $monthly_tax, 
			"monthly_insurance" => $monthly_insurance, "total" => $total);
	}
	
	// simple retirement calculator
	// requires the following $input array:
	// "principal" - the current principal
	// "addition" - pre-retirement addition
	// "growyears" - years to grow
	// "rate" - grow rate
	// "pyears" - years to pay out
	// "prate" - in retirement grow rate
	static function simple_retirement($input) {
		// calculate the basic investment
		$future_value = self::future_value($input['principal'], $input['rate']/100, $input['growyears']);
		$g_series = self::g_series(1+$input['rate']/100, 1, $input['growyears']);		
		$basic = $future_value + $input['addition'] * $g_series;
				
		// annual retirement income
		$annuity_payout = self::annuity_payout($basic, $input['prate']/100, $input['pyears']);	
		return array("annual_retirement_income"=>number_format($annuity_payout, 2));	 
	}
	
	// helpers below
	static function nval($value,$d=null,$min=null,$max=null) {
		if(!is_numeric($value)) $value = 0;

		if ($d) {
			$decimal = pow(10, $d);
			$value = round($value * $decimal) / $decimal;
		}
		if ($min and $value < $min) $value = $min;
		if ($max and $value > $max) $value = $max;
		return $value;
	}
	
	// future value of money
	static function future_value($principal, $rate, $periods) {
		//echo $principal."-".$rate."-".$periods."<br>";
		$future_value = $principal * pow(1 + $rate, $periods);
		return $future_value;
	}
	
	// geom series
	static function g_series($rrate, $m, $periods) {
		$amount = 0;
		if ($rrate == 1) $amount = $periods + 1;
		else $amount = (pow($rrate, $periods+1) - 1) / ($rrate - 1); 
		if ($m >= 1) $amount -= self::g_series($rrate,0,$m-1);
		return $amount;
	}
	
	// calculate annuity payout
	static function annuity_payout($principal, $pay_rate, $pay_years) {		
		$payout = self::future_value($principal, $pay_rate, $pay_years -1) / self::g_series(1+$pay_rate, 0, $pay_years - 1);
		return $payout;
	}
}