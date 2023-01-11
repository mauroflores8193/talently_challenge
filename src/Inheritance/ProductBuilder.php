<?php

namespace App\Inheritance;

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
            'Tumi de Oro Moche' => 'App\Inheritance\TumiProduct',
            'Pisco Peruano' => 'App\Inheritance\PiscoProduct',
            'Ticket VIP al concierto de Pick Floid' => 'App\Inheritance\TicketProduct',
            'Café Altocusco' => 'App\Inheritance\CoffeeProduct',
        ];
        return array_key_exists($this->name, $classByName) ? $classByName[$this->name] : 'App\Inheritance\NormalProduct';
    }
}