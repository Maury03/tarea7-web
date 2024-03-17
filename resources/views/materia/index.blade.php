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

    <table class="table table-striped"> 
      <thead> 
        <tr> 
          <th>Id</th> 
          <th>Materia</th> 
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($materias as $materia) 
          <tr> 
            <td><a href="{{ route('calificacion.index', $materia->id) }}">{{ $materia->id }}</a></td> 
            <td><a href="{{ route('calificacion.index', $materia->id) }}">{{ $materia->nombre }}</a></td> 
          </tr> 
        @endforeach 
      </tbody> 
    </table> 
  <div> 
@endsection 