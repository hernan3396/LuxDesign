<?php

namespace App\Http\Controllers;

use App\Trabajo;
use App\WorkType;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function showHome()
    {
        $primerTrabajo = Trabajo::all()->where('carrusel', true)->sortBy('carrusel')->first();
        $trabajos = Trabajo::all()->where('carrusel', true)->sortBy('carrusel');
        
        return view('home', [
            'trabajos' => $trabajos,
            'primerTrabajo' => $primerTrabajo
        ]);
    }

    public function showAboutUs()
    {
        return view('aboutUs');
    }

    public function showCategorias()
    {
        $workTypes = WorkType::all();
        return view('listaCategoria', ['workTypes' => $workTypes]);
    }

    public function showTrabajos($id)
    {
        $categoria = WorkType::all()->where('workType', $id)->first();
        return view('trabajos', [
            'categoria' => $categoria,
        ]);
    }
}
