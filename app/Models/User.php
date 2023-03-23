<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'user',
        'password',
        'document',
        'email',

    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function bikes()
    {
        return $this->belongsToMany(User::class, 'id', 'user_id');
    }

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = $value ? Hash::make($value) : $this->attributes['password'];
    }

    
}
