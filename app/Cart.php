<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table='cart';
    protected $primaryKey='id';
    protected $fillable=['pokemonName', 'pokemonPicture', 'Quantity', 'price', 'status', 'email'];

    public static function getSubTotalPrice() {
        $SubTotalPrice = Cart::select(DB::raw('(price * Quantity)as Sub_total '))->get();

        return $SubTotalPrice;
    }

    public static function getTotalQuantity() {
        $totalQuantity = DB::table('Cart')->sum('Quantity');

        return $totalQuantity;
    }

    public static function getTotalPrice() {
        $TotalPrice = Cart::select(DB::raw('sum(price * Quantity)as Total_Price '))->get();

        return $TotalPrice;
    }
}
