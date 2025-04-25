<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'message', 'date'];
    
    // For Laravel 8+
    protected $casts = [
        'date' => 'datetime'
    ];
}
