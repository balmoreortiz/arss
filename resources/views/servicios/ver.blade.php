@extends('layouts.app')
@section('title')
    Servicios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalle del Servicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-5">
                            
                            <h1 class="text-center"><strong class="d-inline-block mb-2 text-primary">{{$servicio->NOM_SERV}}</strong></h1>
                            <div class="mb-0">
                                <h5 class="text-dark">Descripción:</h5>
                                <h5 class="text-info">{{$servicio->DESC_SERV}}</h5>
                                <h5 class="text-dark">Precio: </h5>
                                <h5 class="text-info">${{number_format($servicio->PREC_SERV,2)}}</h5>
                                <h5 class="text-dark">Foto: </h5>
                            </div>
                            <img class="card-img-right flex-auto d-lg-block" alt="{{$servicio->id}}" src="{{asset('storage/'.$servicio->FOTO_SERV)}}" style="max-width: 50%; max-height: 50%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Smartsupp Live Chat script -->
     <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'e8f9bb29702cd58d6331f3f05c11752c1d77d10a';
        window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>
@endsection
