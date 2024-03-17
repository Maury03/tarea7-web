@extends('layouts.app') 

@section('content') 
  <style> 
    .uper { 
      margin-top: 40px; 
    } 

  </style> 
  <div class="card uper"> 
    <div class="card-header"> 
      Editar Calificación 
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
      <form method="post" action="{{ route('calificacion.update', $calificacion->id) }}"> 
        @csrf 
        @method('PATCH') 
        <div class="form-group"> 
          <label for="actividad">Actividad:</label> 
          <input type="text" class="form-control" name="actividad" value="{{ $calificacion->actividad }}" /> 
        </div> 
        <div class="form-group"> 
          <label for="tipo">Tipo:</label> 
          <input type="text" class="form-control" name="tipo" value="{{ $calificacion->tipo }}" /> 
        </div> 
        <div class="form-group"> 
          <label for="calificaion">Calificacion:</label> 
          <input type="number" class="form-control" name="calificacion" value="{{ $calificacion->calificacion }}" /> 
        </div> 
        <input type="hidden" name="materiaId" value="{{ $calificacion->materiaId }}" />
        <button type="submit" class="btn btn-primary">Modificar</button> 
        <a href="{{ route('calificacion.index', $calificacion->materiaId) }}" class="btn btn-primary">Cancelar</a> 
      </form> 
    </div> 
  </div> 
@endsection 