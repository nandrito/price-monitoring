<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $guarded = [];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
