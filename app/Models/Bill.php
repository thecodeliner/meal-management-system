<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'user_id',
        'month',
        'total_amount',
        'status',
        'generated_at',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'generated_at' => 'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
