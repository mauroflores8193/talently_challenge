<?php

namespace App;

class ProductBuilder {
    private $name;

    private $quality;

    private $sellIn;

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setQuality($quality) {
        $this->quality = $quality;
        return $this;
    }

    public function setSellIn($sellIn) {
        $this->sellIn = $sellIn;
        return $this;
    }

    public function build() {
        return new Product($this->name, $this->quality, $this->sellIn);
    }
}