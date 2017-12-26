<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table='items';
    protected $primaryKey='id';
    protected $fillable=['name','price'];
}
