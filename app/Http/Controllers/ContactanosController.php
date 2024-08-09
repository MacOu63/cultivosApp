<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;

class ContactanosController extends Controller
{
    public function index(){
        return view('contactanos.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'correo' => 'required',
            'mensaje' => 'required'
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'correo.required' => 'El campo correo electrónico es obligatorio.',
            'correo.email' => 'El campo correo electrónico debe ser una dirección válida.',
            'mensaje.required' => 'El campo mensaje es obligatorio.'
        ]);

        Mail::to('jor@gmail.com')
            ->send(new ContactanosMailable($request->all()));

        /*session()->flash('info', 'Mensaje enviado');*/

        return redirect()->route('contactanos.index')
                ->with('info', 'Mensaje Enviado :D');
    }
}
