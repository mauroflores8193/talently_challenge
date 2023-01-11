<?php

namespace App\FactoryMethod;

abstract class NoLegendaryProduct extends Product {

    private QualityCalculator $qualityCalculator;

    public function __construct($name, $quality, $sellIn) {
        $this->setQualityRange(0, 50);
        parent::__construct($name, $quality, $sellIn);
        $this->qualityCalculator = $this->createQualityCalculator();
    }

    public function tick() {
        $this->setQuality($this->qualityCalculator->calculate($this->getQuality(), $this->getSellIn()));
        $this->sellIn--;
    }

    abstract function createQualityCalculator();

}