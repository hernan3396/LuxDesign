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


        // $path = $request->file('imagen')->store('categorias', 's3');
        // $path = Storage::disk('s3')->put('/categorias', $request->file);

        //get filename with extension
        $filenamewithextension = $request->file('imagen')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
         
        //get file extension
        $extension = $request->file('imagen')->getClientOriginalExtension();
         
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
         
        //Upload File to s3
        Storage::disk('s3')->put('categorias/' .$filenametostore, fopen($request->file('imagen'), 'r+'), 'public');
         
        //Store $filenametostore in the database

        $categoria->imagen = $filenametostore;
        $categoria->save();

        return redirect('admin/categorias')->with('mensaje', "La categoria $categoria->workType se ha creado con exito");
    }

    public function showEditCategoria($id)
    {
        $categoria = WorkType::find($id);
        return view('auth/editCategoria', ['categoria' => $categoria]);
    }


    public function updateCategoria(Request $request, $id)
    {
        $categoria = WorkType::find($id);

        $categoria->update($request->all());

        if ($request->hasFile('imagen')) {
            //get filename with extension
            $filenamewithextension = $request->file('imagen')->getClientOriginalName();
 
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('imagen')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File to s3
            Storage::disk('s3')->put('categorias/' .$filenametostore, fopen($request->file('imagen'), 'r+'), 'public');
     
            //Store $filenametostore in the database

            $categoria->imagen = $filenametostore;
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

        // si en un futuro es problema agregar que esto elimine las imagenes pero prefiero dejar que no lo haga asi hay un "backup"

        $categoria = WorkType::find($id);
        $categoria->delete();
        return redirect('admin/categorias')->with('mensaje', "La categoria $categoria->workType se ha eliminado exitosamente");
    }
}
