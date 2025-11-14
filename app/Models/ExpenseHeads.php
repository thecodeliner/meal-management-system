<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseHeads extends Model
{
     protected $fillable = [
        'head',
        'type',
        'amount',
        'active', //for boolean use. 'status' for enum
        ];
}
