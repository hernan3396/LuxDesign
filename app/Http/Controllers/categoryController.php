<?php

namespace App\Http\Controllers;

use App\Trabajo;
use App\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{

    public function showCategoria()
    {
        $categorias = WorkType::all();
        return view('auth/Categoria', ['categorias' => $categorias]);
    }

    public function showCreateCategoria()
    {
        return view('auth/createCategoria');
    }

    public function store(Request $request)
    {
        $categoria = WorkType::create($request->all());

        $path = $request->file('imagen')->store('img/categoria', 'public');
        $categoria->imagen = $path;
        $categoria->save();

        return redirect('admin/categorias')->with('mensaje', "La categoria $categoria->workType se ha creado con exito");
    }

    public function showEditCategoria($id)
    {
        $categoria = WorkType::find($id);
        return view('auth/EditCategoria', ['categoria' => $categoria]);
    }


    public function updateCategoria(Request $request, $id)
    {
        $categoria = WorkType::find($id);

        $categoria->update($request->all());

        if ($request->hasFile('imagen')) {
            Storage::delete($categoria->imagen, 'public');
            
            $path = $request->file('imagen')->store('img/categorias', 'public');
            $categoria->imagen = $path;
            $categoria->save();
        }

        return redirect('admin/categorias')->with('mensaje', "La categoria $categoria->workType se ha editado exitosamente");
    }

    public function deleteCategory($id)
    {
        $trabajos = Trabajo::all()->where('work_type_id', $id);

        foreach ($trabajos as $trabajo) {
            $trabajo->delete();
        }
        
        $categoria = WorkType::find($id);
        $categoria->delete();
        return redirect('admin/categorias')->with('mensaje', "La categoria $categoria->workType se ha eliminado exitosamente");
    }
}
