<?php

namespace App\Strategy;

interface QualityCalculator {
    public function calculate(int $quality, int $sellIn): int;
}