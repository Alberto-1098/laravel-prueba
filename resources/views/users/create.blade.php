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

<div class="container pl-5 mt-3 ">
  <div class="card shadow">
    <div class="card-header bg-info text-center h4 text-white">Creacion de Usuarios</div>
    <div class="card-body">
      <div class="row ">
        <div class="col-md-6 border-right">
          <form action="{{route('users.store')}}" method="POST">
            @csrf
                  <div class="row mb-1">
                    <div class="col-md-6 col-sm-12">
                      <label for="nombre">Nombres</label>
                      <input type="text" class="form-control form-control-sm "  id="nombre" name="nombre">
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <label for="apellido">apellidos</label>
                      <input type="text" class="form-control form-control-sm"  id="apellido" name="apellido">
                    </div>
                  </div>             
                      <div class="row">
                        <div class="col-md-6"><label for="sexo">sexo</label>
                          <select name="sexo" id="sexo" class="form-control form-control-sm">
                              <option value="M">Masculino</option>
                              <option value="F">Femenio</option>
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <label for="direccion">Direccion</label>
                          <input type="text"  class="form-control form-control-sm" name="direccion" id="direccion">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <label for="nick">Nick</label>
                          <input type="text" class="form-control form-control-sm" id="nick" name="nick">
                        </div>
                      </div>
                      <div class="row mt-1">
                          <div class="col">
                              <label for="contra">Contraseña</label>
                              <input type="password" class="form-control form-control-sm" id="contra" name="contra">
                          </div>
                          <div class="col">
                              <label for="recontra">Confirmacionde contraseña</label>
                              <input type="password" class="form-control form-control-sm" id="recontra" name="recontra">
                          </div>
                        </div>
                        <button type="submit"  class="btn btn-info mt-1">registrar</button>
                </form>
          </div>
          <div class="col-md-6 table-responsive">
              
                  <table class=" table table-bordered table-sm table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>nombre</th>
                          <th>apellido</th>
                          <th>sexo</th>
                          <th>direccion</th>
                          <th>accion</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ( $usuarios as $usuario)
                        <tr class="text-center">
                      <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->apellido}}</td>
                        <td>{{$usuario->sexo}}</td>
                        <td>{{$usuario->direcccion}}</td>
                        <td>
                          <form action="{{ route('users.destroy',$usuario->id) }}" class="text-center" method="post">
                          <a href="{{route('users.show',$usuario->id)}}" class="btn btn-success btn-sm text-white"><i class="far fa-eye"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>                
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
