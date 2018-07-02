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

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request){
         	$query=trim($request->get('searchText'));
         	$productos=DB::table('producto as p')
         	->join('categoria as c','p.categoria_cat_id','=','c.cat_id')
         	->join('subcategoria as s','p.subcategoria_sub_id','=','s.sub_id')
         	->join('categoriadetalle as d','p.categoriadetalle_det_id','=','d.det_id')
         	->join('users as u','p.users_id','=','u.id')
         	->join('ciudad as ci','p.ciudad_ciu_id','=','ci.ciu_id')
         	->select('p.pro_id','p.pro_nom','p.pro_info','p.pro_precio','p.pro_oferta','p.pro_ofer_active','p.pro_foto','p.pro_nomegusta','p.pro_megusta','p.pro_denuncia','c.cat_nom as categoria','u.name as empresa','u.id as empresaid','ci.ciu_nom as ciudad','d.det_nom as detalle','s.sub_nom as subcategoria')
         	->where('p.pro_nom','LIKE','%'.$query.'%')
         	->orwhere('u.name','LIKE','%'.$query.'%')
         	->orderBy('p.pro_id','desc')
         	->paginate(7);
         	if (count($productos)) {
                //si hay resultados en la busqueda
            } else {
               session()->flash('busqueda-producto', ' No se encontro resultados en su busqueda'); 
            }
         	return view('tienda.producto.index', ['productos' => $productos,"searchText"=>$query]);
         }
    }

    public function create() {
    	$categorias=DB::table('categoria')->where('cat_condicion','=','1')->get();
    	$subcategorias=DB::table('subcategoria')->get();
    	$detalles=DB::table('categoriadetalle')->get();
    	$empresas=DB::table('users')->where('activo','=','1')->get();
    	$ciudads=DB::table('ciudad')->get();
		return view("tienda.producto.create",["categorias"=>$categorias,"subcategorias"=>$subcategorias,"detalles"=>$detalles,"empresas"=>$empresas,"ciudads"=>$ciudads]);
	}
    public function store(ProductoFormRequest $request) {
		$producto=new Producto;
		$producto->pro_nom=$request->get('pro_nom');
		$producto->pro_info=$request->get('pro_info');
		$producto->pro_precio=$request->get('pro_precio');
		$producto->pro_oferta=$request->get('pro_oferta');
		$producto->pro_ofer_active=$request->get('pro_ofer_active');
		
		if(Input::hasFile('pro_foto')) {
			$file=Input::file('pro_foto');
			$file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
			$producto->pro_foto=$file->getClientOriginalName();
		}
		
		$producto->pro_nomegusta = 0;
		$producto->pro_megusta = 0;
		$producto->pro_denuncia = 0;
		$producto->categoria_cat_id=$request->get('categoria_cat_id');
		$producto->subcategoria_sub_id=$request->get('subcategoria_sub_id');
		$producto->categoriadetalle_det_id=$request->get('categoriadetalle_det_id');
		$producto->users_id=$request->get('users_id');
		$producto->ciudad_ciu_id=$request->get('ciudad_ciu_id');
		$producto->save();
		return Redirect::to('tienda/producto');
	}
    public function show($id) {
		 return view("tienda.producto.show",["producto"=>Producto::findOrFail($id)]);
	}
    public function edit($id) {
    	$producto=Producto::findOrFail($id);
    	$categorias=DB::table('categoria')->where('cat_condicion','=','1')->get();
    	$subcategorias=DB::table('subcategoria')->get();
    	$detalles=DB::table('categoriadetalle')->get();
    	$empresas=DB::table('users')->where('activo','=','1')->get();
    	$ciudads=DB::table('ciudad')->get();
    	return view("tienda.producto.edit",["producto"=>$producto,"categorias"=>$categorias,"subcategorias"=>$subcategorias,"detalles"=>$detalles,"empresas"=>$empresas,"ciudads"=>$ciudads]);
    }
    public function update(ProductoFormRequest $request,$id) {
        $producto=Producto::findOrFail($id);
		$producto->pro_nom=$request->get('pro_nom');
		$producto->pro_info=$request->get('pro_info');
		$producto->pro_precio=$request->get('pro_precio');
		$producto->pro_oferta=$request->get('pro_oferta');
		$producto->pro_ofer_active=$request->get('pro_ofer_active');
		
		if(Input::hasFile('pro_foto')) {
			$file=Input::file('pro_foto');
			$file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
			$producto->pro_foto=$file->getClientOriginalName();
		}
		
		$producto->pro_nomegusta = 0;
		$producto->pro_megusta = 0;
		$producto->pro_denuncia = 0;
		$producto->categoria_cat_id=$request->get('categoria_cat_id');
		$producto->subcategoria_sub_id=$request->get('subcategoria_sub_id');
		$producto->categoriadetalle_det_id=$request->get('categoriadetalle_det_id');
		$producto->users_id=$request->get('users_id');
		$producto->ciudad_ciu_id=$request->get('ciudad_ciu_id');
		$producto->update();
		return Redirect::to('tienda/producto');
    }
    public function destroy($id){
    	$categoria=DB::table('producto')->where('pro_id','=',$id)->delete();
		return Redirect::to('tienda/producto');
    }
}
