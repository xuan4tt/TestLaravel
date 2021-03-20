<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{   
    protected $table = 'sell';
    protected $fillable = [
        'user_id', 'status'
    ];
    const UPDATED_AT = null;
}
