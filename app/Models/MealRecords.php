<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealRecords extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'breakfast',
        'lunch',
        'dinner',
        'guest',
        'total',
    ];

    protected $table = 'meal_records';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
