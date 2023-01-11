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
        $classByName = [
            'Tumi de Oro Moche' => 'App\TumiProduct',
            'Pisco Peruano' => 'App\PiscoProduct',
            'Ticket VIP al concierto de Pick Floid' => 'App\TicketProduct',
            'Café Altocusco' => 'App\CoffeeProduct',
        ];
        $class = array_key_exists($this->name, $classByName) ? $classByName[$this->name] : 'App\NormalProduct';
        return new $class($this->name, $this->quality, $this->sellIn);
    }
}