<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;

use Tienda\Http\Requests;
use Tienda\Producto;
use Tienda\User;
use Tienda\Categoria;
use Tienda\SubCategoria;
use Tienda\CatDetalle;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Tienda\Http\Requests\ProductoFormRequest;
use DB;

use Response;
use Illuminate\Support\Colletion;

class CargaFavoritosController extends Controller
{
	public function __construct(){
        
    }
    
	public function listar(Request $request) {
        if ($request){
            $query=trim($request->get('searchText'));
            $query2=trim($request->get('searchText2'));
            $productos=DB::table('producto as p')
            ->join('categoria as c','p.categoria_cat_id','=','c.cat_id')
            ->join('subcategoria as s','p.subcategoria_sub_id','=','s.sub_id')
            ->join('categoriadetalle as d','p.categoriadetalle_det_id','=','d.det_id')
            ->join('users as u','p.users_id','=','u.id')
            ->join('ciudad as ci','p.ciudad_ciu_id','=','ci.ciu_id')
            ->select('p.pro_id','p.pro_nom','p.pro_info','p.pro_precio','p.pro_oferta','p.pro_ofer_active','p.pro_foto','p.pro_nomegusta','p.pro_megusta','p.pro_denuncia','c.cat_nom as categoria','u.name as empresa','u.id as empresaid','u.activo as emp_activo','ci.ciu_nom as ciudad','d.det_nom as detalle','s.sub_nom as subcategoria')
            ->where('p.ciudad_ciu_id','LIKE','%'.$query2.'%')
            ->where('p.pro_nom','LIKE','%'.$query.'%')
            ->orderBy('p.pro_id','desc')
            ->paginate(21);
            

            return view('user.producto.favoritos', ['productos' => $productos,"searchText2"=>$query2,"searchText"=>$query]);
        }
    
	}
}
