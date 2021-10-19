@extends('layouts.app')
@section('title')
    Usuario
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('usuarios.create')}}" class="btn btn-warning">Nuevo</a>
                            <table class="table table-stripped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display:none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Correo Electrónico</th>
                                    <th style="color: #fff">Rol</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $u) 
                                        <tr>
                                            <td style="display:none">{{$u->id}}</td>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>
                                                
                                                @if(!@empty($u->getRoleNames()))
                                                    @foreach ($u->getRoleNames() as $rolName)
                                                        <h5><span class="badge bage-dark">{{$rolName}}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{route('usuarios.edit', $u->id) }}">Editar</a>

                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy', $u->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close() !!} 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection