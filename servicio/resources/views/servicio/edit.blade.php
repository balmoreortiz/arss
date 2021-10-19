@extends('servicio.layout')
   
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Servicio</h2>
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

<form action="{{ route('servicio.update',$servicio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="NOM_SERV" value="{{$servicio->NOM_SERV}}" class="form-control" placeholder="Nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                <textarea class="form-control" style="height:150px" name="DESC_SERV" placeholder="Descripción">{{ $servicio->DESC_SERV }}</textarea>
             </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="text" name="PREC_SERV" value="{{ $servicio->PREC_SERV }}" class="form-control" placeholder="Precio">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <input type="file" name="FOTO_SERV" value="{{$servicio->FOTO_SERV}}" class="form-control" placeholder="Foto" id="FOTO_SERV">
                <img src="{{ asset('storage').'/'.$servicio->FOTO_SERV}}" width="150" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
</form>
@endsection

