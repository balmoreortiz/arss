@extends('servicio.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>SERVICIOS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('servicio.create') }}">Crear Nuevo Servicio</a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-light pull-right" style="padding: 2px;">
        <form class="form-inline">
          <input name="buscarpor" class="form-control me-2" style="border-color: #0275d8;" type="search" placeholder="Buscar por Nombre" aria-label="Search">
          <button class="btn btn-outline-success pull-right" type="submit">Buscar</button>
        </form>
    </nav>  

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Foto</th>
            <th width="280px">Acción</th>
        </tr>
        @foreach ($data as $key => $value)
      
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->NOM_SERV }}</td>
            <td>{{ \Str::limit($value->DESC_SERV, 100) }}</td>
            <td>{{ $value->PREC_SERV }}</td>
            
            <td>   
                <img src="{{ asset('storage').'/'.$value->FOTO_SERV}}" width="150" alt="">
            </td>

            <td>
                <form action="{{ route('servicio.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('servicio.show',$value->id) }}">Mostrar</a>    
                    <a class="btn btn-primary" href="{{ route('servicio.edit',$value->id) }}">Editar</a>   
                    @csrf
            {{ method_field('DELETE') }}    
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar el servicio seleccionado?')">Borrar</button>            
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('servicio.index') }}">Volver a Inicio</a>
    </div>
    {!! $data->links() !!}      
@endsection