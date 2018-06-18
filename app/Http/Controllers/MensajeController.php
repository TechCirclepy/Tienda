<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;

use Tienda\Http\Requests;
use Tienda\Mensaje;
use Tienda\Producto;
use Tienda\User;
use Illuminate\Support\Facades\Redirect;
use Tienda\Http\Requests\MensajeFormRequest;
use DB;

use Response;
use Illuminate\Support\Colletion;

class MensajeController extends Controller
{
    public function __construct(){
        
    }

    public function index(Request $request) {
        if ($request){
         	$query=trim($request->get('searchText'));
         	$mensajes=DB::table('mensaje as m')
         	->join('users as u','m.users_id','=','u.id')
         	->join('producto as p','m.producto_pro_id','=','p.pro_id')
         	->select('m.men_id','m.nombre','m.celular','m.mensaje','m.ciudad','m.leido','u.name as empresa','u.id as empresaid','p.pro_nom as producto','p.pro_id as pro_id','p.pro_foto as pro_foto')
         	->where('m.nombre','LIKE','%'.$query.'%')
         	->orwhere('p.pro_nom','LIKE','%'.$query.'%')
         	->orderBy('p.pro_id','desc')
         	->paginate(7);
         	return view('tienda.mensaje.index', ['mensajes' => $mensajes,"searchText"=>$query]);
         }
    }
    public function show($id) {
		 return view("tienda.mensaje.show",["mensaje"=>Mensaje::findOrFail($id)]);
	}
	public function create() {
    	$empresas=DB::table('users')->where('activo','=','1')->get();
    	$productos=DB::table('producto')->get();
		return view("user.mensaje.create",["empresas"=>$empresas,"productos"=>$productos]);
	}
    public function store(MensajeFormRequest $request) {
		$mensaje=new Mensaje;
		$mensaje->nombre=$request->get('nombre');
		$mensaje->celular=$request->get('celular');
		$mensaje->ciudad=$request->get('ciudad');
		$mensaje->leido= 0;
		$mensaje->producto_pro_id=$request->get('producto_pro_id');
		$mensaje->users_id=$request->get('users_id');
		$mensaje->save();
		return Redirect::to('user/producto');
	}
    public function destroy($id){
    	$mensaje=DB::table('mensaje')->where('men_id','=',$id)->delete();
		return Redirect::to('tienda/mensaje');
    }
}
