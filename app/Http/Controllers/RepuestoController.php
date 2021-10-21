<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepuestoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-repuesto|crear-repuesto|editar-repuesto|borrar-repuesto', ['only'=>['index']]);
        $this->middleware('permission:crear-repuesto',['only'=>['create','store']]);
        $this->middleware('permission:editar-repuesto',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-repuesto',['only'=>['destroy']]);
    }
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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'NOM_REP' => 'required',
            'DESC_REP' => 'required',
            'PREC_REP' => 'required|numeric|regex:/^[\d]{0,2}(\.[\d]{1,2})?$/',
        ], [
            'NOM_REP.required' => 'El campo "Nombre" es obligatorio.',
            'DESC_REP.required' => 'El campo "Descripción" es obligatorio.',
            'PREC_REO.required' => 'Ingresar un valor númerico en el campo "Precio", El campo es obligatorio.',
        ]);
 
        $dataRep = request()->except(['_token','_method']);

        if($request->hasFile('FOTO_SERV')){
            $repuesto=Repuesto::findOrFail($id);
            Storage::delete('public/'.$repuesto->FOTO_SERV);
            $dataRep['FOTO_SERV']=$request->file('FOTO_SERV')->store('repuestos','public');
        }

        Repuesto::where('id','=',$id)->update($dataRep);

        $repuesto=Repuesto::findOrFail($id);
        
        return redirect()->route('repuestos.index')
                        ->with('success','Servicio Actualizado con Éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Repuesto::find($id)->delete();
        return redirect()->route('repuestos.index');
    }
}
