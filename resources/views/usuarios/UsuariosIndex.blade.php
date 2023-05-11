@extends('plantillas.plantilla')
@section('contenido')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<h1> Lista de Usuarios </h1>
<a class="btn btn-primary" style="float:right" href="{{route('usuarios.create')}}" >Nuevo Usuario</a>
@if(session('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ session('mensaje') }}
        </div>
 @endif
 <hr>
 <form action="{{ route('usuarios.index') }}" class="input-group mb-2">
  <input type="text" class="" style="with: 800px;" value="{{ $texto }}"  name="busqueda"placeholder="Ingrese una busqueda" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="submit" id="button-addon2">Buscar</button>
</form>
 


<hr>




    
<table class="table">
  <thead>
  <tr>
        <th>No</th>
        <th>nombre</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Direccion</th>
        <th>Ver</th>
        <th>Editar</th>
        <th>Eliminar</th>
            
            
    </tr>
      
  </thead>
  <tbody class="table-group-divider">
  @forelse ($usuarios as $item=>$usuario)
        <tr>
            <td>{{$item + 1}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->telefono}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->direccion}}</td>
            <td><a class="btn btn-warning" href="{{ route('usuarios.show', $usuario->id) }}">Ver</a></td>
            <td><a class="btn btn-primary" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a></td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" 
              data-target="#exampleModal{{$usuario->id}}">
                Eliminar
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{$usuario->id}}"
               tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>¿Esta seguro que desea eliminar este usuario?</p>
                    </div>
                    <form method="post" class="modal-footer"  
                    action="{{ route("usuarios.destroy", ["usuario"=>$usuario->id]) }}">
                      @method("delete")
                      @csrf
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                  </div>
                </div>
              </div>
            </td>
        </tr>

        @empty
        <tr>
            <td colspan="4">No hay Prestamos</td>
        </tr>
        @endforelse
  </tbody>

    
</table>
<a class="btn btn-info align-items-ringt" href="{{('/')}}">Pagina de Inicio</a>
<div class="sidebar-brand d-flex align-items-center justify-content-center" >{{ $usuarios->links() }}</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection