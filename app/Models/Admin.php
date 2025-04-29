<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'email', 'password', 'first_name', 'last_name'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get the user's full name by concatenating first and last name.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
