<?php

namespace Tienda\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    //
    public function index() {
    	return view('mails.mail');
    }

    public function post(Request $request) {
    	$request->validate([
    			'email' => 'required',
    			'subject' => 'required',
                'celular',
    			'message' => 'required'
    		]);
    	$data = [
    		'email'=>$request->email,
    		'subject'=>$request->subject,
            'celular'=>$request->celular,
    		'bodyMessage'=>$request->message,

    	];

    	Mail::send('mails.mailsend', $data, function($message) use ($data) {
    		$message->from($data['email'], 'Fashion Caacupe');
    		$message->to('techcirclepy@gmail.com');
            $message->priority($data['celular']);
    		$message->subject($data['subject']);
    	});
    	session()->flash('notif', 'Mensaje enviado correctamente');
    	return redirect()->back();
    }
}
