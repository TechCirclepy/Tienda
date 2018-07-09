<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Tienda\Http\Requests;
use Tienda\User;
use Tienda\Ciudad;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Tienda\Http\Requests\EmpresaFormRequest;
use DB;

class EmpresaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request){
         	$query=trim($request->get('searchText'));
         	$empresas=DB::table('users as u')
         	->join('ciudad as c','u.ciudad_ciu_id','=','c.ciu_id')
         	->select('u.id','u.name','u.password','u.descripcion','u.direccion','u.cel','u.email','u.foto','u.activo','u.admin','c.ciu_nom as ciudad')
         	->where('u.name','LIKE','%'.$query.'%')
         	->orderBy('u.id','desc')
         	->paginate(7);
         	if (count($empresas)) {
                //si hay resultados en la busqueda elimina la sesion busqueda-producto
                session()->forget('busqueda-producto');
            } else {
               session()->flash('busqueda-producto', ' No se encontro resultados en su busqueda'); 
            }
         	return view('tienda.empresa.index', ['empresas' => $empresas,"searchText"=>$query]);
         }
    }
    public function create() {
    	$ciudads=DB::table('ciudad')->get();
		return view("tienda.empresa.create",["ciudads"=>$ciudads]);
	}
    public function store(EmpresaFormRequest $request) {
		$empresa=new User;
		$empresa->name=$request->get('name');
		$empresa->password=bcrypt($request->get('password'));
		$empresa->descripcion=$request->get('descripcion');
		$empresa->direccion=$request->get('direccion');
		$empresa->cel=$request->get('cel');
		$empresa->email=$request->get('email');
        if(Input::hasFile('foto')) {
            $file=Input::file('foto');
            Image::make($request->file('foto'))
                ->resize(144, 145)
                ->save(public_path().'/imagenes/empresas/' . $file->getClientOriginalName());
            $empresa->foto=$file->getClientOriginalName();
        }
		$empresa->activo='1';
		$empresa->admin=$request->get('admin');
		$empresa->ciudad_ciu_id=$request->get('ciudad_ciu_id');
		$empresa->save();
		return Redirect::to('tienda/empresa');
	}
    public function show($id) {
		 return view("tienda.empresa.show",["empresa"=>User::findOrFail($id)]);
	}
    public function edit($id) {
    	$empresa=User::findOrFail($id);
    	$ciudads=DB::table('ciudad')->get();
    	return view("tienda.empresa.edit",["empresa"=>$empresa,"ciudads"=>$ciudads]);
    }
    public function update(EmpresaFormRequest $request,$id) {
        $empresa=User::findOrFail($id);
		$empresa->name=$request->get('name');
		//$empresa->password=bcrypt($request->get('password'));
		$empresa->descripcion=$request->get('descripcion');
		$empresa->direccion=$request->get('direccion');
		$empresa->cel=$request->get('cel');
		
		if(Input::hasFile('foto')) {
            $file=Input::file('foto');
            Image::make($request->file('foto'))
                ->resize(144, 145)
                ->save(public_path().'/imagenes/empresas/' . $file->getClientOriginalName());
            $empresa->foto=$file->getClientOriginalName();
        }
		$empresa->admin=$request->get('admin');
		$empresa->ciudad_ciu_id=$request->get('ciudad_ciu_id');
		$empresa->update();
		return redirect('/tienda/empresa')->with('editado', 'Empresa editada correctamente!');
    }
    public function destroy($id){
    	$empresa=User::findOrFail($id);
    	if($empresa->activo==1){
    		$empresa->activo="0";
    	}else{
    		$empresa->activo="1";
    	}
		$empresa->update();
		return Redirect::to('tienda/empresa');
    }

}
