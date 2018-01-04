<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $primaryKey='id';
    protected $fillable = ['pokemon_id', 'body'];

    public function pokemon(){
        return $this->belongsTo(Pokemon::class);
    }
}
