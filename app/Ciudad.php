<?php

namespace Tienda;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table='ciudad';

    protected $primaryKey='ciu_id';

    public $timestamps = false;

    protected $fillable=[
    	'ciu_nom',
    ];

    protected $guarded=[

    ];
}
