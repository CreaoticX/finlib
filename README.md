# finlib
*Cloned from http://hywd.info/finlib.phtml*

FinLib is a library with PHP functions and classes for performing financial calculations and equations. Please visit test.php in your browser to have a look at quick demo. The library consists of two main classes - Calculator and Equator.

## The Calculator Class
The Calculator class lets you create and display financial calculators in your site. Each of the calculators is a method of the class. It receives an array of input parameters (typically you would just sent it the `$_POST`), and returns an array containing the results. To use the class simply include the file and create an instance:

```php
include('calculator.php');
$_calculator = new Calculator();
```

Below are the currently available calculators:

### Home Affordability Calculator
Call method `home_affordabilit($input)`.

Requires the following `$input` array:
- "tax" : Annual property taxes
- "insurance" : Annual insurance
- "income_per_period" : Gross annual income
- "monthly_debt" : Monthly debt
- "interest" : Mortgage loan rate
- "downpayment": Downpayment amount

Returns the following output array:
- "min_price" : Minimum house price (conservative)
- "max_price" : Minimum house price (aggressive)
- "min_loan" : Loan amount (conservative)
- "max_loan" : Loan amount (aggressive)
- "min_payment" : Monthly mortgage payment (conservative)
- "max_payment" : Monthly mortgage payment (aggressive)
- "taxes_and_insurance" : Taxes and insurance
- "min_total" : Total monthly payment (conservative)
- "max_total" : Total monthly payment (aggressive)

### Monthly Mortgage Payment Calculator
Call method `mortgage_payment($input)`.

Requires the following `$input` array:
- "years" - loan term in years
- "interest" - loan interest
- "loan_amount" - loan amount
- "annual_tax" - anual tax
- "annual_insurance" - annual insurance

Returns the following output array:
- "monthly_principal" - Monthly Principal + Interest
- "monthly_tax" - Monthly tax
- "monthly_insurance" - Monthly insurance
- "total" - Total monthly payment

### Simple Retirement Calculator
Call method `simple_retirement($input)`.

Requires the following `$input` array:
- "principal" - the current principal
- "addition" - pre-retirement addition
- "growyears" - years to grow
- "rate" - grow rate
- "pyears" - years to pay out
- "prate" - in retirement grow rate

Returns a single value - the annual retirement income.

## The Equator Class
This class executes several important financial equations. Unlike with the Calculator class, normally you would use several of the methods of the Equator to build a single calculator or other financial program. To use the class simply include the file and create an instance:

```php
include('equator.php');
$_equator = new Equator();
```

Below are the currently available equations:

### Effective Interest Rate Equation
Call method `effective_interest($input)`.

Requires the following `$input` array:
- "nominal_interest" - nominal interest rate
- "compounding_frequency" - the compounding frequency per year
- "payments_per_year" - number of payments per year.

Retuns single value - the interest rate.

### Future Value of a Single Sum
Call method `future_value($input)`.

Requires the following `$input` array:
- "present_value" - the present value (the sum)
- "interest" - the interest rate
- "periods" - the number of periods.

Returns single value - the future value of the sum.

### Future Value With Compounding
Call method `future_value_compounded($input)`.

Requires the following `$input` array:
- "present_value" - the present value (the sum)
- "interest" - the interest rate
- "periods" - the number of periods 
- "compounding_frequency" - the compounding frequency per period

Returns single value - the future value of the sum.

### Future Value Of Annuity
Call method `future_value_annuity($input)`.

Requires the following `$input` array:
- "periodic_payment" - payment per period
- "interest" - the interest rate
- "periods" - the number of periods

Returns single value - the future value of the annuity.

### Future Value Of Annuity Due
Call method `future_value_annuity_due($input)`.

Requires the following `$input` array:
- "periodic_payment" - payment per period
- "interest" - the interest rate
- "periods" - the number of periods

Returns single value - the future value of the annuity due.

### Monthly Payment (On loan, mortgage etc)
Call method `monthly_payment($input)`.

Requires the following `$input` array:
- "amount" - the loan amount
- "interest" - the interest rate
- "periods" - the number of periods

Returns single value - the monthly payment amount.

### Present Value of Investment Made in the Future
Call method `present_value($input)`.

Requires the following `$input` array:
- "future_value" - the future value of the investment
- "interest" - the interest rate
- "periods" - the number of periods

Returns single value - the present value of the investment.

### Present Value of Investment Made in the Future With Compounding
Call method `present_value_compounded($input)`.

Requires the following `$input` array:
- "future_value" - the future value of the investment
- "interest" - the interest rate
- "periods" - the number of periods

Returns single value - the present value of the investment.

### Perpetuity
Call method `perpetuity($input)`.

Requires the following `$input` array:
- "payment" - the payment amount
- "interest" - the interest rate

Returns single value - the perpetuity.

### Expected Rate of Return
Call method `ERR($vals)`.

Accepts array of arrays ((probability, ROI), (probability, ROI)...)

Returns single value - the expected rate of return.

