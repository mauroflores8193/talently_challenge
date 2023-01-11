<?php

namespace App\FactoryMethod;

abstract class Product {

    private string $name;

    protected int $quality;

    protected int $sellIn;

    private array $rangeQuality;

    public function __construct($name, $quality, $sellIn) {
        $this->name = $name;
        $this->setQuality($quality);
        $this->sellIn = $sellIn;
    }

    protected function setQualityRange($minQuality, $maxQuality) {
        $this->rangeQuality = [$minQuality, $maxQuality];
    }

    public function getQuality(): int {
        return $this->quality;
    }

    public function getSellIn(): int {
        return $this->sellIn;
    }

    public function setQuality($quality) {
        $this->quality = $quality > $this->getMaxQuality() ? $this->getMaxQuality() : $quality;
        $this->quality = $this->quality < $this->getMinQuality() ? $this->getMinQuality() : $this->quality;
    }

    public function getMinQuality() {
        return $this->rangeQuality[0];
    }

    public function getMaxQuality() {
        return $this->rangeQuality[1];
    }

    abstract function tick();
}
