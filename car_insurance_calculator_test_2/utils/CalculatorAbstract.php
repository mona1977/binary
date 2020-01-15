<?php
/*
Developer : Surendra Gupta
Date : 6-JAN-2019
*/
declare(strict_types=1);

namespace Utils;

abstract class CalculatorAbstract
{
    protected $dayOfTheWeek;
    protected $timeOfTheDay;

    protected function __construct()
    {
        $this->dayOfTheWeek = date("D");
        $this->timeOfTheDay = date("H");
        // we can add more process
    }

    // we can add more common methods here
    /**
     * Bring the nearest .50 or next number
     * @param $number
     * @return float
     */
     protected function nearestCeil($number)
    {

       // $whole = round($number);
        
//        $fraction = $number - $whole;
  //      if($fraction > .50) {
    //        $result = (float) $whole + 1;
      //  } elseif($fraction <> 0) {
        //    $result = (float) $whole + .50;
//        } else {
  //          $result = $number;
    //    }
    //Change logic
    //Surendra Gupta
    //Chnage logic to calculate nearest value
    $result = round($number * 2) / 2

        return $result;
    }
}
