<?php

namespace App\FactoryMethod;

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
        $class = $this->getProductClassByName();
        return new $class($this->name, $this->quality, $this->sellIn);
    }

    private function getProductClassByName(): string {
        $classByName = [
            'Tumi de Oro Moche' => 'App\FactoryMethod\TumiProduct',
            'Pisco Peruano' => 'App\FactoryMethod\PiscoProduct',
            'Ticket VIP al concierto de Pick Floid' => 'App\FactoryMethod\TicketProduct',
            'Café Altocusco' => 'App\FactoryMethod\CoffeeProduct',
        ];
        return array_key_exists($this->name, $classByName) ? $classByName[$this->name] : 'App\FactoryMethod\NormalProduct';
    }
}