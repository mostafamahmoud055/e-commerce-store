<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends User
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'super_admin', 'status',
    ];

    public function store(){
        return $this->hasOne(Store::class,'store_id','id');
    }
}
