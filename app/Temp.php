<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Temp extends Model
{
    protected $table='temp';
    protected $primaryKey='id';
    protected $fillable=['pokemonName', 'Quantity', 'price'];

    public static function getTotalQuantity() {
        $totalQuantity = DB::table('Temp')->sum('Quantity');

        return $totalQuantity;
    }

    public static function getTotalPrice() {
        $TotalPrice = Temp::select(DB::raw('sum(price * Quantity)as Total_Price '))->get();

        return $TotalPrice;
    }
}
