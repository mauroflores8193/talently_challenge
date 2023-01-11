<?php

namespace App\Strategy;

class NormalQualityCalculator implements QualityCalculator {

    public function calculate($quality, $sellIn): int {
        return $quality - $this->getDecrement($sellIn);
    }

    protected function getDecrement($sellIn) {
        if ($sellIn <= 0) {
            return 2;
        } else {
            return 1;
        }
    }
}