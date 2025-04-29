<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'logo_path',
        'created_by',
        'participants_count'
    ];
    
    /**
     * Get the formatted ID with leading zeros
     *
     * @return string
     */
    public function getFormattedIdAttribute()
    {
        return 'P' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}