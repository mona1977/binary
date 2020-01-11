<?php
/**
Developer : Surendra Gupta
Date : 6-JAN-2019
Objective : Calculator Home
 */

declare(strict_types=1);

// side effect: change ini settings
/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/
date_default_timezone_set('Europe/Tallinn');

require __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../utils/config.php';

use Utils\CarInsuranceCalculator;

try {
    $html = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Car Insurance Calculator</title>
                    <link rel="stylesheet" type="text/css" href="style/style.css" />
                </head>
                <body>
                <div class="container">';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) && $_POST['_csrf'] == '1234') {
        $value = (int) $_POST['carValue'];
        $tax = (int) $_POST['tax'];
        $installment = (int) $_POST['installment'];

        // we can call it by DI as well if we call from another class
        $carInsuranceCalculator = new CarInsuranceCalculator();
        $result = $carInsuranceCalculator->calculate($value, $tax, $installment);

        $html .= $result;
    }

    $html .= '<form id="calculator" action="./index.php" method="post" onsubmit="return validate(this)">
        <h3>Car Insurance Calculator</h3>
        <input type="hidden" name="_csrf" value="1234" />
        <fieldset>
            <input placeholder="Estimated value of the car" type="text" name="carValue" id="carValue" tabindex="1" style="width: 200px;" oninput="this.value = this.value.replace(/[^0-9]/g, \'\');" required autofocus>
        </fieldset>
        <fieldset>
            <input placeholder="Tax percentage" type="number" name="tax" id="tax" min="0" max="100" tabindex="2" required>
        </fieldset>
        <fieldset>
            <input placeholder="No of installment" type="number" name="installment" id="installment" min="1" max="12" tabindex="3" required>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="calculator-submit" data-submit="...Sending">Calculate</button>
        </fieldset>
    </form>';

    $html .= '</div>
            </body>
            <script src="script/base.js"></script>
            </html>';

    echo $html;
} catch (Exception $ex) {
    echo $ex->getMessage();
}
