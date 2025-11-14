<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'items',
        'amount',
        'notes',
       
       
    ];

   

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
}
