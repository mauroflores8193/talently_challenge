<?php

namespace App\FactoryMethod;

class TicketQualityCalculator implements QualityCalculator {

    public function calculate($quality, $sellIn): int {
        if ($sellIn <= 0) {
            $quality = 0;
        } else {
            $increment = 1;
            if ($sellIn <= 10) {
                $increment = 2;
            }
            if($sellIn <= 5) {
                $increment = 3;
            }
            $quality += $increment;
        }
        return $quality;
    }
}