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
            <div class="card-header bg-info h4 text-center text-white">Clientes</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <form action="{{route('vendedor.store')}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="fnombre">Nombre</label>
                                    <input type="text" name="fnombre" id="fnombre" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="lnombre">Apellido</label>
                                    <input type="text" name="lnombre" id="lnombre"  class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="documento">Documento</label>
                                    <input type="text" name="documento" id="documento" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="direccion">Correo</label>
                                    <input type="text" name="direccion" id="direccion"  class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="correo">Correo</label>
                                    <input type="email" name="correo" id="correo"  class="form-control form-control-sm">
                                
                                </div>
                            </div>
                            <button type="submit" class="mt-1 btn btn-info text-right">crear</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12 tabel table-responsive">
                        <table class="table table-border table-hover table-sm ">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Documento</th>
                                    <th>Correo</th>
                                    <th>Direccion</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->fnombre}} {{$cliente->lnombre}}</td>
                                    <td>{{$cliente->documento}}</td>
                                    <td>{{$cliente->correo}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>
                                    <form action="{{route('vendedor.destroy',$cliente->id)}}" method="post">
                                    <a href="{{route('vendedor.show',$cliente->id)}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection