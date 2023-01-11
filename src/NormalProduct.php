<?php

namespace App;

class NormalProduct extends NotLegendaryProduct {
    public function calculateQuality() {
        if ($this->isExpired()) {
            $decrement = 2;
        } else {
            $decrement = 1;
        }
        $this->decrementQuality($decrement);
    }

}