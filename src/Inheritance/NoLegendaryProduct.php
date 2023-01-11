<?php

namespace App\Inheritance;

abstract class NoLegendaryProduct extends Product {

    public function __construct($name, $quality, $sellIn) {
        $this->setQualityRange(0, 50);
        parent::__construct($name, $quality, $sellIn);
    }

    protected function incrementQuality($increment) {
        $this->quality += $increment;
        if ($this->quality > $this->getMaxQuality()) {
            $this->quality = $this->getMaxQuality();
        }
    }

    protected function decrementQuality($decrement) {
        $this->quality -= $decrement;
        if ($this->quality < $this->getMinQuality()) {
            $this->quality = $this->getMinQuality();
        }
    }

    public function tick() {
        $this->calculateQuality();
        $this->sellIn--;
    }

    abstract function calculateQuality();

    public function isExpired(): bool {
        return $this->getSellIn() <= 0;
    }

}