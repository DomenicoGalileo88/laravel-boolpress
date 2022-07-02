<?php

namespace App\Http\Controllers;

use App\Mail\AdminContactMessage;
use App\Mail\ContactMessageConfirmation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    public function index()
    {
        return view('guest.message-confirmation');
    }

    public function store(Request $request)
    {
        //ddd($request->all());

        // salva i dati in una variabile
        $data = $request->all();
        // crea l'istanza del messaggio 
        $message = Message::create($data);

        // per vedere la mail a schermo prima di mandarla
        //return (new ContactMessageConfirmation($message))->render();
        //inviare una mail all'admin 
        Mail::to('admin@blog.com')->send(new AdminContactMessage($message));
        // inviare una copia della mail per l'utente
        //ddd($message->email);
        Mail::to($message->email)->send(new ContactMessageConfirmation($message));
        // reindirizza utente
        return redirect()->route('contact-form.index')->with('message', 'Messaggio ricevuto, ti contatteremo entro 48 ore');
    }
}
