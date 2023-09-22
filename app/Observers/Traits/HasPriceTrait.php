<?php

namespace App\Observers\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasPriceTrait
{

    public function setPriceAsInteger(Model $model)
    {
        $model->price = $model->price * 100;
    }

    public function setPriceAsFloat(Model $model)
    {
        $model->price = $model->price / 100;
    }
}
