@extends('plantillas.plantilla')

@section('contenido')
<br>
<br>
<br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Informacion del libro  </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informacion del Libro ') }}: {{$libro->titulo}} </div>

                    <div class="card-body">
                    <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Titulo:') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                    name="nombre" disabled value="{{$libro->titulo}} " 
                                    required autocomplete="nombre" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Autor:') }}</label>

                                <div class="col-md-6">
                                    <input id="autor" type="text" class="form-control @error('apellido')
                                     is-invalid @enderror" disabled name="autor" value="{{$libro->autor}}" 
                                     required autocomplete="autor" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Editorial:') }}</label>

                                  <div class="col-md-6">
                                      <input id="edit" type="edit" class="form-control @error('email') is-invalid @enderror"
                                      name="edit" disabled value="{{$libro->editorial }}" 
                                      required autocomplete="email"></input>
                                  </div>
                                </label>

                            </div>
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Año de Publicacion:') }}</label>

                                  <div class="col-md-6">
                                      <input id="telefono" type="telefono" class="form-control @error('telefono') is-invalid @enderror"
                                      name="telefono" disabled value="{{ $libro->anio_publicado }}" 
                                      required autocomplete="email"></input>
                                  </div>
                                </label>

                            </div>
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad Disponible:') }}</label>

                                  <div class="col-md-6">
                                      <input id="telefono" type="telefono" class="form-control @error('telefono') is-invalid @enderror"
                                      name="telefono" disabled value="{{ $libro->cantidad_dispo }}" 
                                      required autocomplete="email"></input>
                                  </div>
                                </label>

                            </div>


                                <a class="btn btn-danger mb-3  align-items-center " style="float:center" href="{{route('libros.index')}}" >Regresar</a>



@endsection
