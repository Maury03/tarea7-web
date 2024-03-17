@extends('layouts.app') 
@section('content') 
  <style> 
    .uper { 
      margin-top: 40px; 
    } 

  </style> 
  <div class="card uper"> 
    <div class="card-header"> 
      Registrar Calificación 
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
      <form method="post" action="{{ route('calificacion.store') }}"> 
        @csrf 
        <div class="form-group"> 
          <label for="actividad">Actividad:</label> 
          <input type="text" class="form-control" name="actividad" /> 
        </div> 
        <div class="form-group"> 
          <label for="tipo">Tipo:</label> 
          <input type="text" class="form-control" name="tipo" /> 
        </div> 
        <div class="form-group"> 
          <label for="calificacion">Calificación:</label> 
          <input type="number" class="form-control" name="calificacion" /> 
        </div> 
        <input type="hidden" name="materiaId" value="{{ $id }}" />
        <button type="submit" class="btn btn-primary">Crear</button> 
        <a href="{{ route('calificacion.index', $id) }}" class="btn btn-primary">Cancelar</a> 
      </form> 
    </div> 
  </div> 
@endsection 