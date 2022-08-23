<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'id', 'name', 'end_date', 'user_id', 'panel_id'
    ];
}
