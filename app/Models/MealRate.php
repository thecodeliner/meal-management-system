<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealRate extends Model
{
    protected $fillable = [
        'meal_type',
        'rate',
        'effective_from',
        'effective_to',
    ];

    protected $casts = [
        'rate' => 'decimal:2',
        'effective_from' => 'date',
        'effective_to' => 'date',
    ];


}
