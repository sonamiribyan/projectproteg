<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'fb_link',
        'twitter_link',
        'linkden_link',
        'img_url',
    ];
}
