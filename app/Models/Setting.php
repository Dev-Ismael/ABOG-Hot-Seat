<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'location',
        'footer_content',
        'email',
        'phone',
        'phone_formatted',
        'linkedin',
        'facebook',
        'twitter',
        'youtube',
    ];
}
