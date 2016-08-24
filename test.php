<?php
// testing machine
require("equator.php");
require("render.php");
require("calculator.php");
require("vars.php");

if(!empty($_POST['select_calculator'])) {
	// find and generate proper calc form
	// read from input file with fields - vars.php
	// NYI
}

if(!empty($_POST['select_equation'])) {
	// find and generate proper equation form
}

if(!empty($_POST['calculate'])) {
	// find the proper calculator or equator from the vars.php file
	// where we'll have names matched to class / function names so we can eval() or sth like that
	// get the result HTML and display it in the view below
	$_render = new Render();
	
	if(!empty($_POST['test_calculator'])) {
		$_calc = new Calculator();
		$result = call_user_func(array($_calc, $_POST['calculator']), $_POST);		
	}
	
	if(!empty($_POST['test_equation'])) {
		$_eq = new Equator();
		$result = call_user_func(array($_eq, $_POST['equation']), $_POST);
	}
}
?>

<div style="width:90%;margin:auto;">
	<h1>FinLib Simple Test Page</h1>
	
	<p>On this page you can test all the available in the library calculators and financial equations</p>
	
	<h2>Test an Equation</h2>
	
	<form method="post">
	<p>Select an equation to test: <select name="equation">
	<?php foreach($equations as $key=>$name):?>
		<option value="<?=$key?>" <?php if(!empty($_POST['equation']) and $_POST['equation']==$key) echo 'selected'?>><?=$name?></option>
	<?php endforeach;?>
	</select> <input type="submit" name="eq_test" value="Try It!"></p>
	</form>	
	
	<?php if(!empty($_POST['eq_test'])):?>
		<h2><?=$equations[$_POST['equation']]?></h2>	
		
		<form method="post">
			<input type="hidden" name="test_equation" value="1">
			<input type="hidden" name="eq_test" value="1">
			<input type="hidden" name="calculate" value="1">
			<input type="hidden" name="equation" value="<?=$_POST['equation']?>">			
			<?php foreach($equation_fields[$_POST['equation']] as $key=>$field):?>
				<p><label><?=$field['label']?></label> <input type="<?=$field['type']?>" name="<?=$key?>" value="<?=(!empty($_POST[$key]))?$_POST[$key]:''?>"></p>
			<?php endforeach;?>
			<p><input type="submit" value="Calculate"></p>			
		</form>
		
		<?php if(!empty($_POST['calculate']) and !empty($_POST['test_equation'])):?>
		<h3>Results:</h3>		
	<?php $_render -> render_result($result);  
		endif; 
	endif;?>
	
	<h2>Test a Calculator</h2>
	
	<form method="post">
	<p>Select a calculator to test: <select name="calculator">
	<?php foreach($calculators as $key=>$name):?>
		<option value="<?=$key?>" <?php if(!empty($_POST['calculator']) and $_POST['calculator']==$key) echo 'selected'?>><?=$name?></option>
	<?php endforeach;?>
	</select> <input type="submit" name="calc_test" value="Try It!"></p>
	</form>	
	
	<p>&nbsp;</p>
		
	<?php if(!empty($_POST['calc_test'])):?>
		<h2><?=$calculators[$_POST['calculator']]?></h2>	
		
		<form method="post">
			<input type="hidden" name="test_calculator" value="1">
			<input type="hidden" name="calc_test" value="1">
			<input type="hidden" name="calculate" value="1">
			<input type="hidden" name="calculator" value="<?=$_POST['calculator']?>">			
			<?php foreach($calculator_fields[$_POST['calculator']] as $key=>$field):?>
				<p><label><?=$field['label']?></label> <input type="<?=$field['type']?>" name="<?=$key?>" value="<?=(!empty($_POST[$key]))?$_POST[$key]:''?>"></p>
			<?php endforeach;?>
			<p><input type="submit" value="Calculate"></p>			
		</form>
		
		<?php if(!empty($_POST['calculate']) and !empty($_POST['test_calculator'])):?>
		<h3>Results:</h3>		
	<?php $_render -> render_result($result);  
		endif; 
	endif;?>
	
</div>	