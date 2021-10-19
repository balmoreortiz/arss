@extends('servicio.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('servicio.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h1> <strong>{{ $servicio->NOM_SERV }}</strong></h1>   
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                {{ $servicio->DESC_SERV}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio: </strong>
                $ {{ $servicio->PREC_SERV }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
            </div>

            <div class="flex flex-wrap justify-center">
                <div class="w-8/12 sm:w-6/12 px-4">
                    @if(isset($servicio->FOTO_SERV))

                    <img src="{{ asset('storage').'/'.$servicio->FOTO_SERV}}" width="600" alt=" "
                    class="shadow-xl rounded max-w-full h-auto align-middle border-none" />
                    
                    @endif  
                </div> 
            </div>            
        </div>
    </div>
@endsection