<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;

class CompraProductoController extends Controller
{
    //
    public function index() {
    	return view('user.compra_producto.index');
    }
}
