<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'standard',
        'premium',
        'unlimited',
    ];
    
    protected $casts = [
        'standard' => 'array',
        'premium' => 'array',
        'unlimited' => 'array',
    ];

}
