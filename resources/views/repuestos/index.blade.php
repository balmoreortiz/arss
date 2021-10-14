@extends('repuestos.layout')

@section('content')
  <div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Repuestos</h2>
        </div>
        <div class="pull-right">
            <a href="{{ url('repuestos/create') }}" class="btn btn-success">Nuevo Repuesto</a>
        </div>
    </div>
  </div>

    @if($message = Session::get('success'))
       <div class="alert alert-success alert-dismissible" role="alert">
            <p>{{ $message }}</p>
       </div>
    @endif
   <br/>

   <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descuento</th>
            <th>Precio</th>
            <th>Existencia</th>
            <th width="280px">Acciones</th>
        </tr>

        @foreach ($datos as $key => $value) 
            
        <tr>
            <td>{{++$i}}</td>  
            <td> 
                <img src="{{ asset('../storage/app/public').'/'.$value->FOTO_REP }}" alt="" width="125">
            </td>

            <td>{{ \Str::limit($value->NOM_REP, 100)}}</td>
            <td>{{ \Str::limit($value->DESC_REP, 255) }}%</td>
            <td>$ {{$value->PREC_REP}}</td>
            <td>{{$value->EXIS_REP}}</td>
            <td>

            <form action="{{ route('repuestos.destroy',$value->id) }}" method="POST"> 

            <a class="btn btn-info" href="{{ route('repuestos.show',$value->id) }}">Mostrar</a>     
            <a class="btn btn-primary" href="{{ url('/repuestos/'.$value->id.'/edit/') }}">Editar</a>    
           
            @csrf
            {{ method_field('DELETE') }}
               
            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar el repuesto seleccionado?')" value="Borrar">
            
            </form>
            </td>
        </tr>
        @endforeach 
    </table>
   {!! $datos->links() !!}
@endsection