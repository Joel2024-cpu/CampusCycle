<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'nim', 'phone' // 🔧 ADD: nim dan phone
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // 🔧 ADD: Relationships
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    // 🔧 ADD: Helper methods
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
}
