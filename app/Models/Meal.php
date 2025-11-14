<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
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

    protected $casts = [
        'date' => 'date',
        'total' => 'decimal:2',
    ];

    // Accessor for total (computed if needed)
    // protected function getTotalAttribute()
    // {
    //     if (is_null($this->attributes['total'])) {
    //         $rates = MealRate::currentRates(); // Assume a scope or method
    //         return ($this->breakfast * ($rates['breakfast'] ?? 0)) +
    //                ($this->lunch * ($rates['lunch'] ?? 0)) +
    //                ($this->dinner * ($rates['dinner'] ?? 0)) +
    //                ($this->guest * ($rates['guest'] ?? 0));
    //     }
    //     return $this->attributes['total'];
    // }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
