<?php

namespace App\FactoryMethod;

class NormalProduct extends NoLegendaryProduct {

    function createQualityCalculator() {
        return new NormalQualityCalculator();
    }
}