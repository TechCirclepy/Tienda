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

class CargaProductoController extends Controller
{
    public function __construct(){
        
    }

    public function index(Request $request) {
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
            return view('user.producto.index', ['productos' => $productos,"searchText2"=>$query2,"searchText"=>$query]);
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
    public function show($id) {
         return view("index.vista.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id) {
        $producto=Producto::findOrFail($id);
        return view("tienda.producto.edit",["producto"=>$producto]);
    }
    public function update($request,$id) {
        $producto=Producto::findOrFail($id);
        $producto->pro_megusta = $producto->pro_megusta+$request->get('pro_megusta');
        $producto->update();
        return Redirect::to('index/vista');
    }
    public function destroy($id){
        $categoria=DB::table('producto')->where('pro_id','=',$id)->delete();
        return Redirect::to('tienda/producto');
    }
    public function bySubCategoria($id) {
    	return SubCategoria::where('categoria_cat_id', $id)->get();
    }

    public function bySubCategoriadet($id) {
    	return CatDetalle::where('subcategoria_sub_id', $id)->get();
    }
}
