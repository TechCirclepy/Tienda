<?php

namespace Tienda;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table='mensaje';

    protected $primaryKey='men_id';

    public $timestamps = false;

    protected $fillable=[
    	'nombre','celular', 'mensaje', 'ciudad', 'leido', 'producto_pro_id', 'users_id',
    ];

    protected $guarded=[

    ];
/*
    public function producto() {
    	return $this->hasOne('App\Producto');
    }
    */
}
