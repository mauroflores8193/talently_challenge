<?php

namespace App\FactoryMethod;

class TicketProduct extends NoLegendaryProduct {

    function createQualityCalculator() {
        return new TicketQualityCalculator();
    }
}