@extends('plantillas.plantilla')
@section('contenido')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Nuevo usuario</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	
</head>
@if(isset($usuario))
        <h1>Editar usaurio: </h1>
    @else
        <h1>Crear un nueva usaurio</h1>
    @endif
@if($errors->any())
        <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
        @endforeach
@endif

    <div class="card">
        
        <div class="card-body">
            <form method="POST" action="{{ isset($usuario) ? route("usuarios.update", ["usuario"=> $usuario->id]): route("usuarios.store") }}">
              
                @csrf
                @if(isset($usuario))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" require class="form-control" name="nombre" id="nombre" 
                     value="{{ isset($usuario) ? $usuario->nombre: old("nombre") }}" 
                     placeholder="Ingrese el nombre de usuario">
                    
		        </div>

                
                <div class="form-group">
                    <label for="autor">Telefono:</label>
                    <input type="text"
                    value="{{ isset($usuario) ? $usuario->telefono: old("telefono") }}" 
                     name="telefono" id="telefono" class="form-control @error('autor') is-invalid @enderror"
             
                     placeholder="Ingrese el ntelefono del usuario"
                       required>
                    
                </div>

                <div class="form-group">
                    <label for="editorial">Correo electronico:</label>
                    <input type="email"
                    value="{{ isset($usuario) ? $usuario->email: old("email") }}" 
                     name="email" id="email" class="form-control @error('editorial') is-invalid @enderror"
                      
                     placeholder="Ingrese la editorial del libro" required>
                    

                </div>
                <div class="form-group">
                    <label for="anio_public">Direccion:</label>
                    <input type="text"
                    value="{{ isset($usuario) ? $usuario->direccion: old("direccion") }}" 
                     name="direccion" id="direccion" class="form-control @error('anio_public') is-invalid @enderror"
                     required>
                    

                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection