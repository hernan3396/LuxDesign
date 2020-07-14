<?php

namespace App\Http\Controllers;

use App\Trabajo;
use App\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class trabajoController extends Controller
{
    public function showCreateTrabajo()
    {
        $categorias = WorkType::all();
        return view('auth/createTrabajo', [
            'categorias' => $categorias,
        ]);
    }

    public function showTrabajos()
    {
        $trabajos = Trabajo::all();
        $categorias = WorkType::all();
        return view('auth/trabajos', [
            'trabajos'      => $trabajos,
            'categorias'    => $categorias,
        ]);
    }

    public function store(Request $request)
    {
        $trabajo = Trabajo::create($request->all());

        //get filename with extension
        $filenamewithextension = $request->file('imagen')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
        //get file extension
        $extension = $request->file('imagen')->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
         
        //Upload File to s3
        Storage::disk('s3')->put('trabajos/' .$filenametostore, fopen($request->file('imagen'), 'r+'), 'public');
     
        //Store $filenametostore in the database

        $trabajo->imagen = $filenametostore;


        $trabajo->save();
        
        return redirect('admin/trabajos')->with('mensaje', "Se ha creado con exito el trabajo $trabajo->nombre ");
    }

    public function showEditTrabajo($id)
    {
        $trabajo = Trabajo::find($id);
        $workTypes = WorkType::all();
        return view('auth/EditTrabajo', [
            'trabajo'           => $trabajo,
            'workTypes'         => $workTypes
        ]);
    }

    public function updateTrabajo(Request $request, $id)
    {
        $trabajo = Trabajo::find($id);

        $trabajo->update($request->all());

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
            Storage::disk('s3')->put('trabajos/' .$filenametostore, fopen($request->file('imagen'), 'r+'), 'public');
        
            //Store $filenametostore in the database

            $trabajo->imagen = $filenametostore;
            $trabajo->save();
        }



        return redirect('admin/trabajos')->with('mensaje', "El trabajo $trabajo->nombre se ha editado exitosamente");
    }

    public function deleteTrabajo($id){
        $trabajo = Trabajo::find($id);
        $trabajo->delete();
        return redirect('/admin/trabajos')->with('mensaje', "El trabajo $trabajo->nombre ha sido eliminado");
    }
}
