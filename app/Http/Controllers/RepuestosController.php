<?php

namespace App\Http\Controllers;

use App\Models\Repuestos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class RepuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = Repuestos::latest()->paginate(5);

        return view('repuestos.index',compact('datos'))
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
        return view('repuestos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'NOM_REP'=>'required',
            'DESC_REP'=>'required',
            'PREC_REP'=>'required|numeric|regex:/^[\d]{0,2}(\.[\d]{1,2})?$/',
            'EXIS_REP'=>'required|numeric',
            'FOTO_REP'=>['required', 'image'],
        ], [
            'NOM_REP.required'=>'El campo "Nombre" es requerido.',
            'DESC_REP.required'=>'El campo "Descuento" es requerido.',
            'PREC_REP.required'=>'El campo "Precio" es requerido. Debe ingresar un valor numérico.',
            'EXIS_REP.required'=>'El campo "Existencia" es requerido. Debe ingresar un valor numérico.',
            'FOTO_REP.required' => 'Debe ingresar una imagen en el campo "Foto". El campo es requerido.',
        ]);

        $datosRepuestos = request()->except('_token');

        if($request->hasFile('FOTO_REP')){
            $datosRepuestos['FOTO_REP']=$request->file('FOTO_REP')->store('uploads','public');
        }

        Repuestos::insert($datosRepuestos);

        return redirect('repuestos')->with('success', 'Repuesto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $repuestos=Repuestos::findOrFail($id);
        return view('repuestos.show',compact('repuestos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $repuestos=Repuestos::findOrFail($id);
        return view('repuestos.edit', compact('repuestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'NOM_REP'=>'required',
            'DESC_REP'=>'required',
            'PREC_REP'=>'required|numeric|regex:/^[\d]{0,2}(\.[\d]{1,2})?$/',
            'EXIS_REP'=>'required|numeric',
            'FOTO_REP'=>['required', 'image'],
        ], [
            'NOM_REP.required'=>'El campo "Nombre" es requerido.',
            'DESC_REP.required'=>'El campo "Descuento" es requerido.',
            'PREC_REP.required'=>'El campo "Precio" es requerido. Debe ingresar un valor numérico.',
            'EXIS_REP.required'=>'El campo "Existencia" es requerido. Debe ingresar un valor numérico.',
            'FOTO_REP.required' => 'Debe ingresar una imagen en el campo "Foto". El campo es requerido.',
        ]);

        $datosRepuestos = request()->except(['_token','_method']);

        if($request->hasFile('FOTO_REP')){
            $repuestos=Repuestos::findOrFail($id);
            Storage::delete('public/'.$repuestos->FOTO_REP);
            $datosRepuestos['FOTO_REP']=$request->file('FOTO_REP')->store('uploads','public');
        }

        Repuestos::where('id','=',$id)->update($datosRepuestos);

        $repuestos=Repuestos::findOrFail($id);

        return redirect('repuestos')->with('success', 'Repuesto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $repuestos=Repuestos::findOrFail($id);
        
        if(Storage::delete('public/'.$repuestos->FOTO_REP)){
            
            Repuestos::destroy($id);         
        }      

      return redirect('repuestos')->with('sucess', 'Repuesto borrado con éxito');
    }
}
