
<!doctype html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Convert Binary - Text</title>
   </head>
   <body>
      <div class="container">
          <div class="row">
              <div id="content">
                  <?php
/*
Developer : Suredra Gupta
OBJECTIVE : Convert Binary to code and PRINT NAME in loop
*/
      	$str = "01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101 01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110 01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000 00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000 01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000 01110011";
      $strArr = explode(" ", $str);
      $strChr = "";
      foreach ($strArr AS $strVal) {
          $strChr .= chr(bindec($strVal));
      }
      echo $strChr . "<br/>";

      ?>

            </div>
        </div>
      </div>
   </body>
</html>
      

<?
/*
Developer : Suredra Gupta
OBJECTIVE : PRINT NAME in for loop
*/


$name1 = 'Surendra';
$name2 = 'Gupta';

$names[] = $name1;
$names[] = $name2;
$ordStr = $decbinStr = "";
foreach($names as $name){
    echo $name. ' ' ;
}

?>