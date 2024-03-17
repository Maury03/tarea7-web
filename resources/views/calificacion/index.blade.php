@extends('layouts.app') 
@section('content') 
  <style> 
    .margin { 
      margin-top: 40px; 
    } 
  </style> 
  <div class="margin"> 
    @if (session()->get('success')) 
      <div class="alert alert-success"> 
        {{ session()->get('success') }} 
      </div><br /> 
    @endif 
    <div class="row"> 
      <a class="btn btn-primary" href="{{ route('calificacion.create', $id) }}">Agregar</a> 
    </div> 

    <table class="table table-striped"> 
      <thead> 
        <tr> 
          <th>Actividad</th> 
          <th>Tipo</th> 
          <th>Calificacion</th>
          <th width="80px"></th> 
          <th width="80px"></th> 
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($calificacions as $calificacion) 
          <tr> 
            <td><a href="{{ route('calificacion.show', $calificacion->id) }}">{{ $calificacion->actividad }}</a></td> 
            <td><a href="{{ route('calificacion.show', $calificacion->id) }}">{{ $calificacion->tipo }}</a></td> 
            <td><a href="{{ route('calificacion.show', $calificacion->id) }}">{{ $calificacion->calificacion }}</a></td> 
            <td><a href="{{ route('calificacion.edit', $calificacion->id) }}" class="btn btn-primary">Editar</a></td> 
            <td> 
              <form action="{{ route('calificacion.destroy', $calificacion->id) }}" method="post"> 
                @csrf 
                @method('DELETE') 
                <button class="btn btn-danger" type="submit">Borrar</button> 
              </form> 
            </td> 
          </tr> 
        @endforeach 
      </tbody> 
    </table> 
  <div> 
@endsection 