<?php

namespace App\FactoryMethod;

interface QualityCalculator {
    public function calculate(int $quality, int $sellIn): int;
}