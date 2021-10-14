@extends('repuestos.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"></div>
        <div class="pull-right"></div>
    </div>
</div>

<form action="{{ url('/repuestos/'.$repuestos->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{ method_field('PATCH') }}

@include('repuestos.form', ['modo'=>'Editar'])

</form>

@endsection