@extends('layouts.app')
@section('title')
    Servicios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Servicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        @foreach ($errors->all() as $error)
                        <span class="badge badge-danger">{{$error}}</span>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
                         {!! Form::model($servicio, ['method'=> 'PUT',"enctype" =>"multipart/form-data",'route'=>['servicios.update', $servicio->id]])!!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="NOM_SERV">Nombre</label>
                                        {!! Form::text('NOM_SERV', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="DESC_SERV">Descripción</label>
                                        {!! Form::text('DESC_SERV', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div> 
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="PREC_SERV">Precio</label>
                                        {!! Form::text('PREC_SERV', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div> 
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="d-block" for="name">Foto</label>
                                        {!! Form::file('FOTO_SERV', null , array('class'=>'form-control-file','value' => $servicio->FOTO_SERV)) !!}
                                    </div>
                                    <img src="{{ asset('storage/'.$servicio->FOTO_SERV)}}" width="150" class="img-responsive" alt={{$servicio->id}}>
                                </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
