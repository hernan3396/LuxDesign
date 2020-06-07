<?php

namespace App\Http\Controllers;

use App\Trabajo;
use Illuminate\Http\Request;

class carruselController extends Controller
{

    public function changeOrderView()
    {
        $trabajos = Trabajo::all()->where('carrusel', true)->sortBy('carrusel');
        return view('auth/editCarrusel', [
            'trabajos' => $trabajos,
        ]);
    }

    public function changeOrderForm(Request $request)
    {
        /* trae la info de los carrusel */
        $trabajos = Trabajo::all()->where('carrusel', true);


        /*variable aux para alterar el mensaje que recibe*/
        $aux = 0;

        /* llena el array $input con la info del orden del carrusel */
        foreach ($trabajos as $trabajo) {
            $input = $request->input('carrusel');
        }
        
        /*edita la columna carrusel del trabajo correspondiente */
        foreach ($trabajos as $trabajo) {
            if ($input[$trabajo->id]) {
                $trabajo->carrusel = $input[$trabajo->id];
                $trabajo->save();
                $aux++;
            }
        }


        /* just in case
                foreach ($trabajos as $trabajo) {
            $input = $request->input('carrusel');

        }
        dd($input);
        */

        if ($aux) {
            return redirect('/admin/carrusel')->with('mensaje', "El carrusel ha sido editado");
        }
        else {
            return redirect('/admin/carrusel');
        }

    }
}
