<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class ReporteProductoController extends Controller
{
    //
    public function index() {
    	return view('user.producto.index');
    }

    public function store(Request $request) {
    	$request->validate([
    		'producto' => 'required',
    		'empresa' => 'required',
    		'motivoreporte' => 'required',
    		'otros'
    		]);
    	$data = [
    		'producto'=>$request->producto,
    		'empresa'=>$request->empresa,
    		'motivoreporte'=>$request->motivoreporte,
    		'otros'=>$request->otros,
    	];

    	Mail::send('mails.sendreporte', $data, function($message) use ($data) {
    		$message->from('REPORTE DE PRODUCTO', 'Fashion Caacupe');
    		$message->to('techcirclepy@gmail.com');
    		$message->subject($data['producto']);
    		$message->priority($data['empresa']);
    		$message->priority($data['motivoreporte']);
    		$message->priority($data['otros']);
    	});

    	session()->flash('notify', 'Su reporte se registro correctamente');
    	return redirect()->back();
    }
}
