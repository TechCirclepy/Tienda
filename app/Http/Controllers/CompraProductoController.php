<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;
use Tienda\Http\Requests;
use Tienda\Mensaje;
use Tienda\Producto;
class CompraProductoController extends Controller
{
    //index no hace nada mientras
    public function index() {
    	$compra = new Mensaje;
    	return view('user.compra_producto.index', ['compra' => $compra ]);
    }

    public function store(Request $request) {

    	$compra = new Mensaje;
        $compra->celular = $request->celular;
        $compra->mensaje = $request->mensaje;
        $compra->nombre = $request->nombre;
        $compra->ciudad = $request->ciudad;
        $compra->leido = 0;
        $compra->producto_pro_id = $request->producto_pro_id;
        $compra->users_id = $request->users_id;

        if($compra -> save()) {
            session()->flash('notificacion', 'Pedido realizado con exito!..');
    		return redirect()->back();
        } else {
            return view('user.compra_producto.index', ['compra' => $compra ]);
        }
    }

    public function show($id) {
        $compra = new Mensaje;
        $productos = Producto::findOrFail($id)->get();
        return view('user.compra_producto.index', compact('compra', 'productos'));
    }

}
