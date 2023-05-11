@extends('plantillas.plantilla')

@section('contenido')
<br>
<br>
<br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Informacion del prestamo   </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informacion del prestamo ') }}: {{$prestamo->id}} </div>

                    <div class="card-body">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de solicitud:') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="datatime-local" class="form-control @error('nombre') is-invalid @enderror" 
                                    name="nombre" disabled value="{{$prestamo->fecha_solicitud}} " 
                                    required autocomplete="nombre" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha del prestamo:') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="datatime-local" class="form-control @error('nombre') is-invalid @enderror" 
                                    name="nombre" disabled value="{{$prestamo->fecha_prestamo}} " 
                                    required autocomplete="nombre" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Devolucion:') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="datatime-local" class="form-control @error('nombre') is-invalid @enderror" 
                                    name="nombre" disabled value="{{$prestamo->fecha_devolucion}} " 
                                    required autocomplete="nombre" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Libro:') }}</label>

                                <div class="col-md-6">
                                    <input id="autor" type="text" class="form-control @error('apellido')
                                     is-invalid @enderror" disabled name="autor" value="{{$prestamo->libro->titulo}}" 
                                     required autocomplete="autor" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Usuario:') }}</label>

                                  <div class="col-md-6">
                                      <input id="edit" type="text" class="form-control @error('email') is-invalid @enderror"
                                      name="edit" disabled value="{{$prestamo->usuario->nombre }}" 
                                      required autocomplete="email"></input>
                                  </div>
                                </label>

                            </div>
                            


                                <a class="btn btn-danger mb-3  align-items-center " style="float:center" href="{{route('prestamos.index')}}" >Regresar</a>



@endsection
