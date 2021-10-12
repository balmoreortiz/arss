@section('content')
@extends('servicio.layout')

<form action="{{ route('servicio.store')}}" method="POST" enctype="multipart/form-data">

    @csrf

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Registrar Nuevo Servicio</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('servicio.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('servicio.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="string" name="NOM_SERV" value="{{old("NOM_SERV")}}" id="Nombre" class="form-control" placeholder="Ingresar Nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                <input type="string" name="DESC_SERV" value="{{old("DESC_SERV")}}" id="descripcion" class="form-control" placeholder="Ingresar Descripción">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="string" name="PREC_SERV" value="{{old("PREC_SERV")}}" id="precio"  class="form-control" placeholder="Ingresar Precio">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <input type='file' name="FOTO_SERV"  value="{{old("FOTO_SERV")}}" id="FOTO_SERV" class="form-control" placeholder="Ingresar Foto">            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>   
</form>

@endsection

    