<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'home',
        'about',
        'contact',
    ];

    protected $casts = [
        'home' => 'array',
        'about' => 'array',
        'contact' => 'array',
    ];
}
