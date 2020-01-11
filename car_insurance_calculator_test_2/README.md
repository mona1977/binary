#Developer : Surendra Gupta
#Date : 09-Jan-2019
# This will calculate insurance premium for Car
#===============================================

### Requirements

*  PHP version 7.0 or newer

### How to install

* Copy folder into any of your directory. If you do not have docker and composer install in your system then kindly follow these links
 https://docs.docker.com/install/ and
 https://getcomposer.org/download/
* run `docker-compose up -d`
* run `composer install`
* go to browser and run `http://localhost:8000/index.php`

### How to run phpunit tests

* run `./vendor/bin/phpunit tests/CarInsuranceCalculatorTest.php` from root

#Calculator
 It is a simple car insurance calculator which will output price of the policy using vanilla PHP
 and JavaScript, using SOLID principal:
 1. Create HTML form with fields:
 • Estimated value of the car (100 - 100 000 EUR)
 • Tax percentage (0 - 100%)
 • Number of instalments (count of payments in which client wants to pay for the
 policy (1 – 12))
 • Calculate button
 2. Build calculator logic in PHP using OOP:
 •
 </Test>
 Base price of policy is 11% from entered car value, except every Friday 15-20
 o’clock (user time) when it is 13%<Test>
 • Commission is added to base price (17%)
 • Tax is added to base price (user entered)
 • Calculate different payments separately (if number of payments are larger than 1)
 • Installment sums must match total policy sum- pay attention to cases where sum
 does not divide equally
 • Output is rounded to two decimal places
 3. Final output (price matrix):
 • Base price
 • Price with commission and tax (every instalment separately)
 • Tax amount (separately with every instalment)
 • Grand totals (sum of all instalments): Price with commission and tax, total tax
 sum.