<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-servicio|crear-servicio|editar-servicio|borrar-servicio', ['only'=>['index','show']]);
        $this->middleware('permission:crear-servicio',['only'=>['create','store']]);
        $this->middleware('permission:editar-servicio',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-servicio',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');        
        $order = ($request->get('order')) ? $request->get('order') : 'asc';
        $data = Servicio::where('NOM_SERV','like',"%$nombre%")->latest()->orderBy('PREC_SERV', $order)->paginate(4);
        $order = ($order == 'desc') ? 'asc' : 'desc';
        return view('servicios.index',compact('data','order','nombre'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.crear');
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
        $dataServ['FOTO_SERV']=$request->file('FOTO_SERV')->store('servicios','public');
    }

        SERVICIO::insert($dataServ);
      
       return redirect()->route('servicios.index')
                       ->with('success','Servicio Creado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        return view('servicios.ver',compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
        return view('servicios.editar',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'NOM_SERV' => 'required',
            'DESC_SERV' => 'required',
            'PREC_SERV' => 'required|numeric|regex:/^[\d]{0,2}(\.[\d]{1,2})?$/',
        ], [
            'NOM_SERV.required' => 'El campo "Nombre" es obligatorio.',
            'DESC_SERV.required' => 'El campo "Descripción" es obligatorio.',
            'PREC_SERV.required' => 'Ingresar un valor númerico en el campo "Precio", El campo es obligatorio.',
        ]);
 
        $dataServ = request()->except(['_token','_method']);

        if($request->hasFile('FOTO_SERV')){
            $servicio=SERVICIO::findOrFail($id);
            Storage::delete('public/'.$servicio->FOTO_SERV);
            $dataServ['FOTO_SERV']=$request->file('FOTO_SERV')->store('servicios','public');
        }

        SERVICIO::where('id','=',$id)->update($dataServ);

        $servicio=SERVICIO::findOrFail($id);
        
        return redirect()->route('servicios.index')
                        ->with('success','Servicio Actualizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Servicio::find($id)->delete();
        return redirect()->route('servicios.index');
    }

}
