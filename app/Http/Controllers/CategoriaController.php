<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;

use Tienda\Http\Requests;
use Tienda\Categoria;
use Illuminate\Support\Facades\Redirect;
use Tienda\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request){
         	$query=trim($request->get('searchText'));
         	$categorias=DB::table('categoria')->where('cat_nom','LIKE','%'.$query.'%')
         	->where('cat_condicion','=','1')
         	->orderBy('cat_id','asc')
         	->paginate(7);
         	return view('tienda.categoria.index', ['categorias' => $categorias,"searchText"=>$query]);
         }
    }
    public function create() {
		return view("tienda.categoria.create");
	}
    public function store(CategoriaFormRequest $request) {
		$categoria=new Categoria;
		$categoria->cat_nom=$request->get('cat_nom');
		$categoria->cat_detalle=$request->get('cat_detalle');
		$categoria->cat_condicion='1';
		$categoria->save();
		return Redirect::to('tienda/categoria');
	}
    public function show($id) {
		 return view("tienda.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
	}
    public function edit($id) {
    	return view("tienda.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id) {
        $categoria=Categoria::findOrFail($id);
		$categoria->cat_nom=$request->get('cat_nom');
		$categoria->cat_detalle=$request->get('cat_detalle');
		$categoria->update();
		return Redirect::to('tienda/categoria');
    }
    public function destroy($id){
    	$categoria=Categoria::findOrFail($id);
    	$categoria->cat_condicion="0";
		$categoria->update();
		return Redirect::to('tienda/categoria');
    }
}
