<?php

namespace App\Observers;

use App\Models\Pizza;
use App\Observers\Traits\HasPriceTrait;

class PizzaObserver
{

    use HasPriceTrait;

    public function saving(Pizza $pizza): void
    {
        $this->setPriceAsInteger($pizza);
    }

    public function retrieved(Pizza $pizza): void
    {
        $this->setPriceAsFloat($pizza);
    }
}
