<?php

namespace Tienda;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';

    protected $primaryKey='id';
    
    protected $fillable = [
        'name', 'email', 'password', 'direccion', 'cel', 'foto', 'descripcion', 'activo','ciudad_ciu_id','admin',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
