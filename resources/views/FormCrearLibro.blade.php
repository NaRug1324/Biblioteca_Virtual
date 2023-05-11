@extends('plantillas.plantilla')
@section('contenido')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Nuevo libro</title>
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
            <form method="POST" action="{{ isset($libro) ? route("libros.update", ["libro"=> $libro->id]): route("libros.store") }}">
              
                @csrf
                @if(isset($libro))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="titulo">Texto:</label>
                    <input type="text" require class="form-control" name="titulo" id="titulo" 
                     value="{{ isset($libro) ? $libro->titulo: old("titulo") }}" 
                     placeholder="Ingrese el titulo del libro">
                    
		        </div>

                
                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <input type="text"
                    value="{{ isset($libro) ? $libro->autor: old("autor") }}" 
                     name="autor" id="autor" class="form-control @error('autor') is-invalid @enderror"
             
                     placeholder="Ingrese el nombre del autor del Libro"
                       required>
                    
                </div>

                <div class="form-group">
                    <label for="editorial">Editorial:</label>
                    <input type="text"
                    value="{{ isset($libro) ? $libro->editorial: old("editorial") }}" 
                     name="editorial" id="editorial" class="form-control @error('editorial') is-invalid @enderror"
                      
                     placeholder="Ingrese la editorial del libro" required>
                    

                </div>
                <div class="form-group">
                    <label for="anio_public">Año Publicado:</label>
                    <input type="text"
                    value="{{ isset($libro) ? $libro->anio_publicado: old("anio_publicado") }}" 
                     name="anio_public" id="anio_public" class="form-control @error('anio_public') is-invalid @enderror"
                     required>
                    

                </div>
                <div class="form-group">
                    <label for="cantidad_dispo">Cantidad Disponible:</label>
                    <input type="number"
                    value="{{ isset($libro) ? $libro->cantidad_dispo: old("cantidad_dispo") }}" 
                     name="cantidad_dispo" id="cantidad_dispo" class="form-control @error('cantidad_dispo') is-invalid @enderror"
                     placeholder="Ingrese la cantiadad de libros" required >
                    

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection