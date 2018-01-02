<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class element extends Model
{
    protected $table='elements';
    protected $primaryKey='id';
    protected $fillable=['elementName'];
}
