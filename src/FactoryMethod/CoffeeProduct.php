<?php

namespace App\FactoryMethod;

class CoffeeProduct extends NoLegendaryProduct {

    function createQualityCalculator() {
        return new CoffeeQualityCalculator();
    }
}