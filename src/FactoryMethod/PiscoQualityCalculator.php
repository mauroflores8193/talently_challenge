<?php

namespace App\FactoryMethod;

class PiscoQualityCalculator implements QualityCalculator {

    public function calculate($quality, $sellIn): int {
        if ($sellIn <= 0) {
            $increment = 2;
        } else {
            $increment = 1;
        }
        return $quality + $increment;
    }
}