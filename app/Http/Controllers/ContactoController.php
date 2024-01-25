<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMaillabe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDOException;

class ContactoController extends Controller
{
    public function pintarForm()
    {
        return view('contactoform.form');
    }

    public function procesarForm(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'contenido' => ['required', 'string', 'min:10']
        ]);

        try {
            Mail::to('admin@email.com')->send(new ContactoMaillabe(ucwords($request->nombre), $request->email, ucfirst($request->contenido)));
        } catch (PDOException $ex) {
            die("Error" . $ex->getMessage());
        }
        return redirect()->route('home')->with('mensaje', 'El email ha sido enviado');
    }
}
