@extends('layouts.app')
@section('title')
    Servicios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Servicios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('servicios.create')}}" class="btn btn-warning">Nuevo</a>
                                </div>
                                <div class="col-6">
                                    <form>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto mx-2">
                                                <i class="fas fa-search text-body"></i>
                                            </div>
                                            <!--end of col-->
                                            <div class="col mx-2">
                                                {!! Form::text('NOM_SERV', null, array('class'=>'form-control','placeholder'=>'Buscar por Nombre','name'=>'buscarpor')) !!}
                                            </div>
                                            <!--end of col-->
                                            <div class="col-auto">
                                                <button class="btn btn-success" type="submit">Buscar</button>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                    </form>
                                </div>
                            </div>                            
                            <table class="table table-stripped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display:none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Descripción</th>
                                    <th style="color: #fff">Precio</th>
                                    <th style="color: #fff">Foto</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $servicio)
                                        <tr style="height: 150px;">
                                            <td style="display:none">{{$servicio->id}}</td>
                                            <td>{{$servicio->NOM_SERV}}</td>
                                            <td>{{$servicio->DESC_SERV}}</td>
                                            <td>{{'$'.number_format($servicio->PREC_SERV,2)}}</td>
                                            <td>   
                                                <img src="{{ asset('storage/'.$servicio->FOTO_SERV)}}" width="150" class="img-responsive" alt={{$servicio->id}}>
                                            </td>
                                            <td style="width: 20%">
                                                <a class="btn btn-primary" href="{{route('servicios.edit', $servicio->id) }}">Editar</a>

                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['servicios.destroy', $servicio->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close() !!} 
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $data->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection