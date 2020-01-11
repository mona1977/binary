<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Utils\CarInsuranceCalculator;

class CarInsuranceCalculatorTest extends TestCase
{
    /**
     Developer : Surendra Gupta
     Date : 6-JAN-2019
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }


    /**
     * Test calculation capability
     */
    public function testCalculator()
    {
        $calculator = new CarInsuranceCalculator();

        if (date("D") === "Fri" && date("H") >= 15 && date("H") <= 20) {
            $premiumRate = 13;
            $basePrimium = 1100 * ($premiumRate / 100);

            $result = $this->invokeMethod($calculator, 'calculator', array(10, 2, $basePrimium));
            
            $expectedResult = [
                [
                    'basePrimium' => 71.5,
                    'commission' => 12.5,
                    'totalTax' => 7.5,
                    'totalCost' => 91
                ],
                [
                    'basePrimium' => 143,
                    'commission' => 25,
                    'totalTax' => 15,
                    'totalCost' => 182
                ]
            ];
        } else {
            $premiumRate = 11;
            $basePrimium = 1100 * ($premiumRate / 100);

            $result = $this->invokeMethod($calculator, 'calculator', array(10, 2, $basePrimium));

            $expectedResult = [
                [
                    'basePrimium' => 60.5,
                    'commission' => 10.5,
                    'totalTax' => 6.5,
                    'totalCost' => 77
                ],
                [
                    'basePrimium' => 121,
                    'commission' => 21,
                    'totalTax' => 13,
                    'totalCost' => 154
                ]
            ];
        }


        $this->assertTrue(!empty($result));
        $this->assertEquals(2, count($result));
        $this->assertEquals($expectedResult, $result);
    }

}