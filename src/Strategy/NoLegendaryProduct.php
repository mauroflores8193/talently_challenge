<?php

namespace App\Strategy;

class NoLegendaryProduct extends Product {

    private QualityCalculator $qualityCalculator;

    public function __construct($name, $quality, $sellIn) {
        $this->setQualityRange(0, 50);
        parent::__construct($name, $quality, $sellIn);
    }

    public function tick() {
        $this->setQuality($this->qualityCalculator->calculate($this->getQuality(), $this->getSellIn()));
        $this->sellIn--;
    }

    public function setQualityCalculator($qualityCalculator) {
        $this->qualityCalculator = $qualityCalculator;
    }

}