<?php

namespace Tienda;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categoria';

    protected $primaryKey='cat_id';

    public $timestamps = false;

    protected $fillable=[
    	'cat_nom',
    	'cat_detalle'
    ];

    protected $guarded=[

    ];
}
