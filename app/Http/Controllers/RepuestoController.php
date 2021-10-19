<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Repuesto::latest()->paginate(5);
    
        return view('repuestos.index',compact('data'))
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
        return view('repuestos.crear');
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
            'PREC_REP'=>'required|numeric',
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

        Repuesto::insert($datosRepuestos);

        return redirect('repuestos')->with('success', 'Repuesto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Repuesto $repuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Repuesto $repuesto)
    {
        return view('repuestos.editar',compact('repuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repuesto $repuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repuesto $repuesto)
    {
        //
    }
}
