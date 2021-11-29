<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepuestoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-repuesto|crear-respuesto|editar-respuesto|eliminar-respuesto', ['only'=>['index','show']]);
        $this->middleware('permission:crear-respuesto',['only'=>['create','store']]);
        $this->middleware('permission:editar-respuesto',['only'=>['edit','update']]);
        $this->middleware('permission:eliminar-respuesto',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $nombre = $request->get('buscarpor');
        $orderPre = 'asc';
        $orderMarc = 'asc';
        if ($request->get('orderPre')) {
            $orderPre = $request->get('orderPre');
            $data = Repuesto::where('NOM_REP','like',"%$nombre%")->orderBy('PREC_REP', $orderPre)->latest()->paginate(10);
            
        } else if ($request->get('orderMarc')){
            $orderMarc = $request->get('orderMarc');
            $data = Repuesto::where('NOM_REP','like',"%$nombre%")->orderBy('MARC_REP', $orderMarc)->latest()->paginate(10);
        } else 
            $data = Repuesto::where('NOM_REP','like',"%$nombre%")->orderBy('MARC_REP', $orderMarc)->orderBy('PREC_REP', $orderPre)->latest()->paginate(10);
        
        $orderPre = ($orderPre == 'asc') ? 'desc' : 'asc';
        $orderMarc = ($orderMarc == 'asc') ? 'desc' : 'asc';
        return view('repuestos.index',compact('data','orderPre','orderMarc','nombre'))
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
            $datosRepuestos['FOTO_REP']=$request->file('FOTO_REP')->store('repuesto','public');
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
        return view('repuestos.ver',compact('repuesto'));
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
            $dataRep['FOTO_REP']=$request->file('FOTO_REP')->store('repuestos','public');
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
