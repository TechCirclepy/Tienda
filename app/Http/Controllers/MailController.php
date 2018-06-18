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
    			'message' => 'required'
    		]);
    	$data = [
    		'email'=>$request->email,
    		'subject'=>$request->subject,
    		'bodyMessage'=>$request->message,

    	];

    	Mail::send('mails.mailsend', $data, function($message) use ($data) {
    		$message->from('hernachaparro@gmail.com', 'laravel');
    		$message->to($data['email']);
    		$message->subject($data['subject']);
    	});
    	session()->flash('notif', 'Mensaje enviado correctamente');
    	return redirect()->back();
    }
}
