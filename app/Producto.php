<?php

namespace Tienda;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='pro_id';

    public $timestamps = false;

    protected $fillable=[
    	'pro_nom',
    	'pro_info',
    	'pro_precio',
    	'pro_oferta',
    	'pro_ofer_active',
    	'pro_foto',
        'pro_nomegusta',
        'pro_megusta',
        'pro_denuncia',
    	'categoria_cat_id',
    	'users_id',
        'subcategoria_sub_id',
        'categoriadetalle_det_id'
    ];

    protected $guarded=[

    ];
}
