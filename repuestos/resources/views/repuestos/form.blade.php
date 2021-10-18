<h1> {{ $modo }} Repuesto</h1>
<br/>

@if(count($errors)>0)

    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hubo algunos problemas con su entrada. <br><br>
<ul>
         @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
     @endforeach
</ul>
    </div>

@endif

<div class="form-group">

<strong>Nombre del repuesto:</strong>  
<input type="char" class="form-control" name="NOM_REP" value="{{ isset($repuestos->NOM_REP)? $repuestos->NOM_REP:old('NOM_REP') }}" placeholder="Nombre">

</div>

<div class="form-group">

<strong> Descuento: </strong>
<input type="char" class="form-control" name="DESC_REP" value="{{ isset($repuestos->DESC_REP)?$repuestos->DESC_REP:old('DESC_REP') }}" placeholder="Descuento">

</div>

<div class="form-group">

<strong> Precio: </strong>
<input type="float" class="form-control" name="PREC_REP" value="{{ isset($repuestos->PREC_REP)?$repuestos->PREC_REP:old('PREC_REP') }}" placeholder="Precio">

</div>

<div class="form-group">

<strong> Existencia: </strong>
<input type="int" class="form-control" name="EXIS_REP" value="{{ isset($repuestos->EXIS_REP)?$repuestos->EXIS_REP:old('EXIS_REP') }}" placeholder="Existencia"> 

</div>

<div class="form-group">

<strong>Imagen:</strong> 

@if(isset($repuestos->FOTO_REP))

<img src="{{ asset('../storage/app/public').'/'.$repuestos->FOTO_REP }}" alt="" width="150">

@endif
<input type="file" class="form-control" name="FOTO_REP" value="{{old('FOTO_REP')}}"  placeholder="Imagen" id="FOTO_REP">

</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} ">

<a class="btn btn-primary" href="{{ url('repuestos/') }}">Regresar</a>

 <br> 