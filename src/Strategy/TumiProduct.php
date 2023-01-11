<?php

namespace App\Strategy;

class TumiProduct extends Product {

    public function __construct($name, $quality, $sellIn) {
        $this->setQualityRange(1, 80);
        parent::__construct($name, $quality, $sellIn);
    }

    public function tick() {
    }

}