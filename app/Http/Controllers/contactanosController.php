<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactanosController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    //
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:4|max:20|string',
            'celular' => 'required|min:4|max:20|string',
            'correo' => 'required|email',
            'ciudad' => 'required|max:30',
            'mensaje' => 'min:1|max:100|string',
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('sassadidas@gmail.com')->send($correo);

        return redirect()->route('welcome')->with('guardado', 'Nos contactaremos contigo lo mas pronto posible');
    }
}
