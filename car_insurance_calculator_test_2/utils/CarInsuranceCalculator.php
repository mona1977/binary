<?php

declare(strict_types=1);

namespace utils;

use Utils\CalculatorAbstract;
use Utils\CalculatorInterface;

/**
 Developer : Surendra Gupta
 Date : 6-JAN-2019
 ** Class CarInsuranceCalculator.
 */
class CarInsuranceCalculator extends CalculatorAbstract implements CalculatorInterface
{
    private $commissionRate = COMMISSION_RATE;

    /**
     * CarInsuranceCalculator constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $value
     * @param int $tax
     * @param int $installment
     *
     * @return float
     */
    public function calculate(int $value, int $tax, int $installment): string
    {
        $result = [];
        try {
            if ($this->dayOfTheWeek == 'Fri' && $this->timeOfTheDay >= 15 && $this->timeOfTheDay <= 20) {
                $premiumRate = 13;
                $basePrimium = $value * ($premiumRate / 100);
            } else {
                $premiumRate = 11;
                $basePrimium = $value * ($premiumRate / 100);
            }

            $result = $this->calculator($tax, $installment, $basePrimium);

            if (!empty($result)) {
                $additionalData = [
                    'result' => $result,
                    'installment' => $installment,
                    'value' => $value,
                    'premiumRate' => $premiumRate,
                    'commissionRate' => $this->commissionRate,
                    'tax' => $tax,
                ];
                $result = $this->createHtmlResult($result, $additionalData);
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return $result;
    }

    /**
     * @param int $value
     * @param int $tax
     * @param int $installment
     *
     * @return array
     */
    private function calculator(int $tax, int $installment, $basePrimium): array
    {
        $result = [];
        try {
            $commission = $basePrimium * ($this->commissionRate / 100);
            $totalTax = $basePrimium * ($tax / 100);
            $totalCost = ($basePrimium + $commission + $totalTax);

            $result[0]['basePrimium'] = $this->nearestCeil((float) ($basePrimium / $installment));
            $result[0]['commission'] = $this->nearestCeil((float) ($commission / $installment));
            $result[0]['totalTax'] = $this->nearestCeil((float) ($totalTax / $installment));
            $result[0]['totalCost'] = $this->nearestCeil((float) ($totalCost / $installment));

            $result[1]['basePrimium'] = $this->nearestCeil($result[0]['basePrimium'] * $installment);
            $result[1]['commission'] = $this->nearestCeil($result[0]['commission'] * $installment);
            $result[1]['totalTax'] = $this->nearestCeil($result[0]['totalTax'] * $installment);
            $result[1]['totalCost'] = $this->nearestCeil($result[0]['totalCost'] * $installment);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return $result;
    }

    /**
     * @param array $result
     *
     * @return string
     */
    private function createHtmlResult(array  $result, array $additionalData): string
    {
        $html = '';
        try {
            if (!empty($result)) {
                $html .= '<div class="row"><div class="top"><i>Your Insurance Calculation</i></div></div>';
                // header
                $html .= '<div class="row"><div class="column"><b>Policy</b></div><div class="column">&nbsp;</div>';
                for ($i = 0; $i < $additionalData['installment']; ++$i) {
                    $html .= '<div class="column"><b>'.($i + 1).' installment</b></div>';
                }
                $html .= '</div>';
                $html .= '<div class="row"><div class="column">Value</div>';
                $html .= '<div class="column">'.number_format($additionalData['value'], 2).'</div>';
                $html .= '</div>';

                $html .= '<div class="row">';
                $html .= '<div class="column">Base Premium ('.$additionalData['premiumRate'].'%)</div>';
                $html .= '<div class="column">'.number_format($result[1]['basePrimium'], 2).'</div>';
                for ($i = 0; $i < $additionalData['installment']; ++$i) {
                    $html .= '<div class="column">'.number_format($result[0]['basePrimium'], 2).'</div>';
                }
                $html .= '</div>';

                $html .= '<div class="row">';
                $html .= '<div class="column">Commission ('.$additionalData['commissionRate'].'%)</div>';
                $html .= '<div class="column">'.number_format($result[1]['commission'], 2).'</div>';
                for ($i = 0; $i < $additionalData['installment']; ++$i) {
                    $html .= '<div class="column">'.number_format($result[0]['commission'], 2).'</div>';
                }
                $html .= '</div>';

                $html .= '<div class="row">';
                $html .= '<div class="column">Tax ('.$additionalData['tax'].'%)</div>';
                $html .= '<div class="column">'.number_format($result[1]['totalTax'], 2).'</div>';
                for ($i = 0; $i < $additionalData['installment']; ++$i) {
                    $html .= '<div class="column">'.number_format($result[0]['totalTax'], 2).'</div>';
                }
                $html .= '</div>';

                $html .= '<div class="row">';
                $html .= '<div class="column"><b>Total Cost</b></div>';
                $html .= '<div class="column">'.number_format($result[1]['totalCost'], 2).'</div>';
                for ($i = 0; $i < $additionalData['installment']; ++$i) {
                    $html .= '<div class="column"><b>'.number_format($result[0]['totalCost'], 2).'</b></div>';
                }
                $html .= '</div>';
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return $html;
    }
}
