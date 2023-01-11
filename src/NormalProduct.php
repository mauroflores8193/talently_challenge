<?php

namespace App;

class NormalProduct extends NoLegendaryProduct {
    public function calculateQuality() {
        $this->decrementQuality($this->decrement());
    }

    protected function decrement(): int {
        if ($this->isExpired()) {
            $decrement = 2;
        } else {
            $decrement = 1;
        }
        return $decrement;
    }

}