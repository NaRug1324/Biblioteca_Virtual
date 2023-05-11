@extends('plantillas.plantilla')
@section('contenido')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Nuevo prestamo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	
</head>
@if(isset($nota))
        <h1>Editar Libro: </h1>
    @else
        <h1>Crear un nueva Libro</h1>
    @endif
@if($errors->any())
        <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
        @endforeach
@endif

    <div class="card">
        
        <div class="card-body">
            <form method="POST" action="{{ isset($prestamo) ? route("prestamos.update", ["prestamo"=> $prestamo->id]): route("prestamos.store") }}">
              
                @csrf
                @if(isset($prestamo))
                    @method('put')
                @endif
                
                <div class="form-group">
                    <label for="fecha_sol">Fecha de solicitud:</label>
                    <input type="datetime-local"
                    value="{{ isset($prestamo) ? $prestamo->fecha_solicitud: old("fecha_solicitud") }}" 
                     name="fecha_sol" id="fecha_sol" class="form-control "
                     required>
                    

                </div>

                <div class="form-group">
                    <label for="fecha_pres">Fecha de Prestamo:</label>
                    <input type="datetime-local"
                    value="{{ isset($prestamo) ? $prestamo->fecha_prestamo: old("fecha_prestamo") }}" 
                     name="fecha_pres" id="fecha_pres" class="form-control "
                     required>
                    

                </div>
                <div class="form-group">
                    <label for="fecha_dev">Fecha devolucion:</label>
                    <input type="datetime-local"
                    value="{{ isset($prestamo) ? $prestamo->fecha_devolucion: old("fecha_devolucion") }}" 
                     name="fecha_dev" id="fecha_dev" class="form-control "
                     required>
                    

                </div>
                
                <div class="form-group">
                    <label for="libro_id">Libro:</label>
                    <select name="libro_id" id="libro_id" class="form-control @error('libro_id') is-invalid @enderror" required>
                        <option value="{{ isset($prestamo) ? $prestamo->libro_id: old("libro_id") }}">Seleccionar un Libro</option>
                        @foreach($libros as $libro)
                            <option value="{{$libro->id}}" >{{ $libro->titulo }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="usuario_id">Usuario:</label>
                    <select name="usuario_id" id="usuario_id" class="form-control @error('contacto_id') is-invalid @enderror" required>
                        <option value="{{ isset($prestamo) ? $prestamo->usuario_id: old("usuario_id") }}">Seleccionar Usuario</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{$usuario->id}}" >{{ $usuario->nombre }}</option>
                        @endforeach
                    </select>

                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection