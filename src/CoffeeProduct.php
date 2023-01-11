<?php

namespace App;

class CoffeeProduct extends NormalProduct {

    public function decrement(): int {
        return parent::decrement() * 2;
    }

}