<?php

namespace App\Http\Controllers;

use App\Models\SERVICIO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = SERVICIO::latest()->paginate(5);
    
        return view('servicio.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOM_SERV' => 'required',
            'DESC_SERV' => 'required',
            'PREC_SERV' => 'required|numeric|regex:/^[\d]{0,2}(\.[\d]{1,2})?$/',
            'FOTO_SERV'=> ['required', 'image'],
        ], [
            'NOM_SERV.required' => 'El campo "Nombre" es obligatorio.',
            'DESC_SERV.required' => 'El campo "Descripción" es obligatorio.',
            'PREC_SERV.required' => 'Ingresar un valor númerico en el campo "Precio", El campo es obligatorio.',
            'FOTO_SERV.required' => 'Ingresar una imagen en el campo "Foto", El campo es obligatorio.',
        ]);

      // $dataServ = request()->all();
      $dataServ = request()->except('_token');
 
        if($request->hasFile('FOTO_SERV')){
        $dataServ['FOTO_SERV']=$request->file('FOTO_SERV')->store('uploads','public');
    }

        SERVICIO::insert($dataServ);
      
       return redirect()->route('servicio.index')
                       ->with('success','Servicio Creado con Éxito');
   }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servicio $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(servicio $servicio)
    {
        return view('servicio.show',compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(servicio $servicio)
    {
        //    
        return view('servicio.edit',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicio $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NOM_SERV' => 'required',
            'DESC_SERV' => 'required',
            'PREC_SERV' => 'required|numeric|regex:/^[\d]{0,2}(\.[\d]{1,2})?$/',
            'FOTO_SERV'=> ['required', 'image'],
        ], [
            'NOM_SERV.required' => 'El campo "Nombre" es obligatorio.',
            'DESC_SERV.required' => 'El campo "Descripción" es obligatorio.',
            'PREC_SERV.required' => 'Ingresar un valor númerico en el campo "Precio", El campo es obligatorio.',
            'FOTO_SERV.required' => 'Ingresar una imagen en el campo "Foto", El campo es obligatorio.',
        ]);
 
        $dataServ = request()->except(['_token','_method']);

        if($request->hasFile('FOTO_SERV')){
            $servicio=SERVICIO::findOrFail($id);
            Storage::delete('public/'.$servicio->FOTO_SERV);
            $dataServ['FOTO_SERV']=$request->file('FOTO_SERV')->store('uploads','public');
        }

        SERVICIO::where('id','=',$id)->update($dataServ);

        $servicio=SERVICIO::findOrFail($id);
        
        return redirect()->route('servicio.index')
                        ->with('success','Servicio Actualizado con Éxito');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicio $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicio $servicio)
    {
        $servicio->delete();
    
        return redirect()->route('servicio.index')
                        ->with('success','Servicio Eliminado con Éxito');
    }
}