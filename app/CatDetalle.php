<?php

namespace Tienda;

use Illuminate\Database\Eloquent\Model;

class CatDetalle extends Model
{
    protected $table='categoriadetalle';

    protected $primaryKey='det_id';

    public $timestamps = false;

    protected $fillable=[
    	'det_nom',
    	'subcategoria_sub_id',
    	'categoria_cat_id'
    ];

    protected $guarded=[

    ];
}
