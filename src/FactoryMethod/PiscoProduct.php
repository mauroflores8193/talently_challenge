<?php

namespace App\FactoryMethod;

class PiscoProduct extends NoLegendaryProduct {

    function createQualityCalculator() {
        return new PiscoQualityCalculator();
    }
}