<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $fillable = [
        'name', 'amount','products_id','users_id',
    ];
}
