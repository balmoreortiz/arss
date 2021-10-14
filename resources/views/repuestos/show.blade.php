@extends('repuestos.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </br>
                <h2>Mostrar Repuestos</h2>
           </br>
            </div>
            <div class="pull-right">
            </br>
                <a class="btn btn-primary" href="{{ route('repuestos.index') }}"> Atrás</a>
            </br>
                <form action="{{ url('/repuestos/'.$repuestos->id)}}" method="post" enctype="multipart/form-data">
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $repuestos->NOM_REP }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descuento:</strong>
                {{ $repuestos->DESC_REP }}%
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio:</strong>
               $ {{ $repuestos->PREC_REP }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Existencia:</strong>
                {{ $repuestos->EXIS_REP }}
            </div>
        </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Imagen:</strong>
           </div>

           <div class="flex flex-wrap justify-center">
              <div class="w-8/12 sm:w-6/12 px-4">                                  

                @if(@isset($repuestos->FOTO_REP))

                <img src="{{ asset('../storage/app/public').'/'.$repuestos->FOTO_REP }}" alt="" width="150">

                @endif
              </div>
           </div>
      </div>
    </div>

@endsection