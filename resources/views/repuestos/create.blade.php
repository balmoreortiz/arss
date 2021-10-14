@extends('repuestos.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"></div>
        <div class="pull-right"></div>
    </div>
</div>

<form action="{{ url('/repuestos')}}" method="post" enctype="multipart/form-data">

@csrf
@include('repuestos.form',['modo'=>'Registrar'])


</form>
@endsection