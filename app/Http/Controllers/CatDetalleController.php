<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;

use Tienda\Http\Requests;
use Tienda\CatDetalle;
use Tienda\Categoria;
use Tienda\SubCategoria;
use Illuminate\Support\Facades\Redirect;
use Tienda\Http\Requests\CatDetalleFormRequest;
use DB;


class CatDetalleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request){
            $query=trim($request->get('searchText'));
            $detalles=DB::table('categoriadetalle as d')
            ->join('subcategoria as s','d.subcategoria_sub_id','=','s.sub_id')
            ->join('categoria as c','d.categoria_cat_id','=','c.cat_id')
            ->select('d.det_id','d.det_nom','s.sub_nom as subcategoria','c.cat_nom as categoria')
            ->where('d.det_nom','LIKE','%'.$query.'%')
            ->orwhere('c.cat_nom','LIKE','%'.$query.'%')
            ->orwhere('s.sub_nom','LIKE','%'.$query.'%')
            ->orderBy('d.det_id','desc')
            ->paginate(7);
            return view('tienda.detalle.index', ['detalles' => $detalles,"searchText"=>$query]);
         }
    }
    public function create() {
        $categorias=DB::table('categoria')->get();
    	$subcategorias=DB::table('subcategoria')->get();
        $detalles=DB::table('categoriadetalle')->get();
		return view("tienda.detalle.create",["categorias"=>$categorias,"subcategorias"=>$subcategorias,"detalles"=>$detalles]);
	}
    public function store(CatDetalleFormRequest $request) {
		$detalle=new CatDetalle;
		$detalle->det_nom=$request->get('det_nom');
        $detalle->subcategoria_sub_id=$request->get('subcategoria_sub_id');
        $detalle->categoria_cat_id=$request->get('categoria_cat_id');
		$detalle->save();
		return Redirect::to('tienda/detalle');
	}
    public function show($id) {
		 return view("tienda.detalle.show",["detalle"=>CatDetalle::findOrFail($id)]);
	}
    public function edit($id) {
    	$detalle=CatDetalle::findOrFail($id);
        $categorias=DB::table('categoria')->get();
    	$subcategorias=DB::table('subcategoria')->get();
    	return view("tienda.detalle.edit",["detalle"=>$detalle,"subcategorias"=>$subcategorias,"categorias"=>$categorias]);
    }
    public function update(ProductoFormRequest $request,$id) {
        $detalle=new CatDetalle;
		$detalle->det_nom=$request->get('det_nom');
		$detalle->subcategoria_sub_id=$request->get('subcategoria_sub_id');
        $detalle->categoria_cat_id=$request->get('categoria_cat_id');
		$detalle->update();
		return Redirect::to('tienda/detalle');
    }
    public function destroy($id){
    	$categoria=DB::table('categoriadetalle')->where('det_id','=',$id)->delete();
		return Redirect::to('tienda/detalle');
    }
}
