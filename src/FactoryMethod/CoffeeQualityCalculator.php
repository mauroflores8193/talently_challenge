<?php

namespace App\FactoryMethod;

class CoffeeQualityCalculator extends NormalQualityCalculator {

    protected function getDecrement($sellIn) {
        return parent::getDecrement($sellIn) * 2;
    }
}