<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'rut', 'dv', 
        'primer_nombre', 
        'segundo_nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'telefono', 
        'email', 
        'password', 
        'vistas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'vistas' => 'array',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
}