<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;

use Tienda\Http\Requests;
use Tienda\Ciudad;
use Illuminate\Support\Facades\Redirect;
use Tienda\Http\Requests\CiudadFormRequest;
use DB;

class CiudadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request){
         	$query=trim($request->get('searchText'));
         	$ciudads=DB::table('ciudad')->where('ciu_nom','LIKE','%'.$query.'%')
         	->orderBy('ciu_id','asc')
         	->paginate(7);
         	return view('tienda.ciudad.index', ['ciudads' => $ciudads,"searchText"=>$query]);
         }
    }
    public function create() {
		return view("tienda.ciudad.create");
	}
    public function store(CiudadFormRequest $request) {
		$ciudad=new Ciudad;
		$ciudad->ciu_nom=$request->get('ciu_nom');
		$ciudad->save();
		return Redirect::to('tienda/ciudad');
	}
    public function show($id) {
		 return view("tienda.ciudad.show",["ciudad"=>Ciudad::findOrFail($id)]);
	}
    public function edit($id) {
    	return view("tienda.ciudad.edit",["ciudad"=>Ciudad::findOrFail($id)]);
    }
    public function update(CiudadFormRequest $request,$id) {
        $ciudad=Ciudad::findOrFail($id);
		$ciudad->ciu_nom=$request->get('ciu_nom');
		$ciudad->update();
		return Redirect::to('tienda/ciudad');
    }
    public function destroy($id){
    	$ciudad=DB::table('ciudad')->where('ciu_id','=',$id)->delete();
		return Redirect::to('tienda/ciudad');;
    }
}
