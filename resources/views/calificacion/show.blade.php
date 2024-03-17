@extends('layouts.app') 

@section('content') 
  <style> 
    .uper { 
      margin-top: 40px; 
    } 

  </style> 
  <div class="card uper"> 
    <div class="card-header"> 
      Ver Calificación 
    </div> 

    <div class="card-body"> 
      @if ($errors->any()) 
        <div class="alert alert-danger"> 
          <ul> 
            @foreach ($errors->all() as $error) 
              <li>{{ $error }}</li> 
            @endforeach 
          </ul> 
        </div><br /> 
      @endif 

      <div class="form-group"> 
        <label for="actividad">Actividad:</label> 
        <input type="text" class="form-control" name="actividad" value="{{ $calificacion->actividad }}" disabled /> 
      </div> 
      <div class="form-group"> 
        <label for="tipo">Tipo:</label> 
        <input type="text" class="form-control" name="tipo" value="{{ $calificacion->tipo }}" disabled /> 

      </div> 
      <div class="form-group"> 
        <label for="calificacion">Calificacion:</label> 
        <input type="number" class="form-control" name="calificacion" value="{{ $calificacion->calificacion }}" disabled /> 
      </div> 
      <a href="{{ route('calificacion.index', $calificacion->materiaId) }}" class="btn btn-primary">Volver</a> 
    </div> 
  </div> 
@endsection 