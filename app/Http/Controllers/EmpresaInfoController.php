<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;
use Tienda\User;
use Tienda\Producto;
class EmpresaInfoController extends Controller
{
    //
    public function __construct(){

    }

    public function show($id) {
    	$empresas = User::findOrFail($id)->get();
    	$productos = Producto::all();
    	return view('user.empresa.info-empresa', compact('empresas', 'productos'));
    }
}
