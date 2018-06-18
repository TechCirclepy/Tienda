<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;

use Tienda\Http\Requests;
use Tienda\Categoria;
use Tienda\SubCategoria;
use Illuminate\Support\Facades\Redirect;
use Tienda\Http\Requests\SubCategoriaFormRequest;
use DB;

class SubCategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request){
         	$query=trim($request->get('searchText'));
         	$subcategorias=DB::table('subcategoria as s')
         	->join('categoria as c','s.categoria_cat_id','=','c.cat_id')
         	->select('s.sub_id','s.sub_nom','c.cat_nom as categoria')
         	->where('s.sub_nom','LIKE','%'.$query.'%')
            ->orwhere('c.cat_nom','LIKE','%'.$query.'%')
         	->orderBy('s.sub_id','desc')
         	->paginate(7);
         	return view('tienda.subcategoria.index', ['subcategorias' => $subcategorias,"searchText"=>$query]);
         }
    }
    public function create() {
    	$categorias=DB::table('categoria')->where('cat_condicion','=','1')->get();
		return view("tienda.subcategoria.create",["categorias"=>$categorias]);
	}
    public function store(SubCategoriaFormRequest $request) {
		$subcategoria=new SubCategoria;
		$subcategoria->sub_nom=$request->get('sub_nom');
		$subcategoria->categoria_cat_id=$request->get('categoria_cat_id');
		$subcategoria->save();
		return Redirect::to('tienda/subcategoria');
	}
    public function show($id) {
		 return view("tienda.subcategoria.show",["subcategoria"=>SubCategoria::findOrFail($id)]);
	}
    public function edit($id) {
    	$subcategoria=SubCategoria::findOrFail($id);
    	$categorias=DB::table('categoria')->where('cat_condicion','=','1')->get();
    	return view("tienda.subcategoria.edit",["subcategoria"=>$subcategoria,"categorias"=>$categorias]);
    }
    public function update(SubCategoriaFormRequest $request,$id) {
        $subcategoria=SubCategoria::findOrFail($id);
        $subcategoria->sub_nom=$request->get('sub_nom');
        $subcategoria->categoria_cat_id=$request->get('categoria_cat_id');
		$subcategoria->update();
		return Redirect::to('tienda/subcategoria');
    }
    public function destroy($id){
    	$subcategoria=DB::table('subcategoria')->where('sub_id','=',$id)->delete();
		return Redirect::to('tienda/subcategoria');
    }
}
