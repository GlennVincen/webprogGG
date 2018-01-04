<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table='pokemons';
    protected $primaryKey='id';
    protected $fillable = ['pokemonName', 'element_id', 'pokemonPicture', 'gender', 'description', 'price'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function element(){
        return $this->belongsTo(Element::class);
    }


}
