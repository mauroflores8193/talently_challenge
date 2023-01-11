<?php

namespace App\Strategy;

class ProductBuilder {

    private $name;

    private $quality;

    private $sellIn;

    private QualityCalculator $qualityCalculator;

    public function setName($name): ProductBuilder {
        $this->name = $name;
        return $this;
    }

    public function normal() {
        $this->setName('normal');
        $this->qualityCalculator = new NormalQualityCalculator();
        return $this;
    }

    public function pisco() {
        $this->setName('Pisco Peruano');
        $this->qualityCalculator = new PiscoQualityCalculator();
        return $this;
    }

    public function tumi() {
        $this->setName('Tumi de Oro Moche');
        return $this;
    }

    public function ticket() {
        $this->setName('Ticket VIP al concierto de Pick Floid');
        $this->qualityCalculator = new TicketQualityCalculator();
        return $this;
    }

    public function coffee() {
        $this->setName('Café Altocusco');
        $this->qualityCalculator = new CoffeeQualityCalculator();
        return $this;
    }

    public function setQuality($quality): ProductBuilder {
        $this->quality = $quality;
        return $this;
    }

    public function setSellIn($sellIn): ProductBuilder {
        $this->sellIn = $sellIn;
        return $this;
    }

    public function build(): Product {
        if (isset($this->qualityCalculator)) {
            $product = new NoLegendaryProduct($this->name, $this->quality, $this->sellIn);
            $product->setQualityCalculator($this->qualityCalculator);
            return $product;
        } else {
            return new TumiProduct($this->name, $this->quality, $this->sellIn);
        }
    }
}