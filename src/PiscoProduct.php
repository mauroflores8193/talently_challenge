<?php

namespace App;

class PiscoProduct extends NoLegendaryProduct {

    public function calculateQuality() {
        if ($this->isExpired()) {
            $increment = 2;
        } else {
            $increment = 1;
        }
        $this->incrementQuality($increment);
    }

}