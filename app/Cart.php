<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='cart';
    protected $primaryKey='id';
    protected $fillable=['pokemonName', 'pokemonPicture', 'Quantity', 'price', 'status'];
}
