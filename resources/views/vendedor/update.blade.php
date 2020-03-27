@extends('welcome')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Konecta</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="/users">Usuarios <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/vendedor">Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">Cerrar sesion</a>
        </li>
      </ul>
      
    </div>
  </nav>
@section('content')
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header bg-info h4 text-white ">Actualizar Cliente</div>
            <div class="card-body">
                @foreach ($clientes as $cliente)
                <form action="{{ route('vendedor.update',$cliente->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="fnombre">Nombre</label>
                            <input type="text" name="fnombre" id="fnombre" class="form-control form-control-sm" value="{{$cliente->fnombre}}">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="lnombre">Apellido</label>
                                <input type="text" name="lnombre" id="lnombre"  class="form-control form-control-sm" value="{{$cliente->lnombre}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="documento">Documento</label>
                                <input type="text" name="documento" id="documento" class="form-control form-control-sm" value="{{$cliente->documento}}">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" id="direccion"  class="form-control form-control-sm" value="{{$cliente->direccion}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label for="correo">Correo</label>
                                <input type="email" name="correo" id="correo"  class="form-control form-control-sm" value="{{$cliente->correo}}">
                            
                            </div>
                        </div>
                        <button type="submit" class="mt-1 btn btn-success text-right">Actualizar</button>
                </form>   
                @endforeach     
    
            </div>
        </div>
    </div>
@endsection