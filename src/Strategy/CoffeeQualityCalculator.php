<?php

namespace App\Strategy;

class CoffeeQualityCalculator extends NormalQualityCalculator {

    protected function getDecrement($sellIn) {
        return parent::getDecrement($sellIn) * 2;
    }
}