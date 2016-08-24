<?php
// to rend the functions into visible calculators/forms
class Render {
	function __construct() {
		// let me load a theme file here ...
		// NYI
	}	
		
	// renders form fields for a calculator
	function render_calculator($fields) {
		 // prettify the texts a little bit and output a form
		 foreach($fields as $field) {
		 		$friendly_name = ucfirst(str_replace("_", " ", $field));
		 	  echo "<div><label>$friendly_name:</label><input type='text' name='$field'></div>";
		 }
	}
	
	function render_result($result) {
		if(is_array($result)) {
			foreach($result as $key => $val) {
				$label = ucfirst($key);
				$label = str_replace("_"," ",$key);
				
				echo "<p>$label: <b>";
				if(is_numeric($val)) echo number_format($val,2);
				else echo $val;
				echo "</b></p>";
			}
		} else { // $result is not array
			echo "<p>Result: <b>";
			if(is_numeric($result)) echo number_format($result,2);
			else echo $result;
			echo "</b></p>";
		}	
	}
}