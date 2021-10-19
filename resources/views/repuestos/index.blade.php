@extends('layouts.app')
@section('title')
    Repuestos
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Repuestos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('repuestos.create')}}" class="btn btn-warning">Nuevo</a>
                            <table class="table table-stripped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display:none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Descripción</th>
                                    <th style="color: #fff">Precio</th>
                                    <th style="color: #fff">Existencia</th>
                                    <th style="color: #fff">Foto</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $repuesto)
                                        <tr style="height: 150px;">
                                            <td style="display:none">{{$repuesto->id}}</td>
                                            <td>{{$repuesto->NOM_REP}}</td>
                                            <td>{{$repuesto->DESC_REP}}</td>
                                            <td>{{$repuesto->PREC_REP}}</td>
                                            <td>{{$repuesto->EXIS_REP}}</td>
                                            <td>   
                                                <img src="{{ asset('storage/'.$repuesto->FOTO_REP)}}" width="150" class="img-responsive" alt={{$repuesto->id}}>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{route('repuestos.edit', $repuesto->id) }}">Editar</a>

                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['repuestos.destroy', $repuesto->id], 'style'=>'display:inline']) !!}
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