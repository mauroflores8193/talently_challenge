<?php

namespace App;

class TicketProduct extends NoLegendaryProduct {

    public function calculateQuality() {
        if ($this->isExpired()) {
            $this->decrementQuality($this->quality);
        } else {
            $increment = 1;
            if ($this->getSellIn() <= 10) {
                $increment = 2;
            }
            if($this->getSellIn() <= 5) {
                $increment = 3;
            }
            $this->incrementQuality($increment);
        }
    }

}