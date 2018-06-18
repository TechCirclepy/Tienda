<?php

namespace Tienda;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table='subcategoria';

    protected $primaryKey='sub_id';

    public $timestamps = false;

    protected $fillable=[
    	'sub_nom',
    	'categoria_cat_id'
    ];

    protected $guarded=[

    ];
}
