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
   <div class="container mt-2">
       <div class="row">        
        <div class="col-md-12 col-12">
          <div class="card shadow">
            <div class="card-header bg-info text-center h4 text-white ">
              Actualizacion de Usuarios
            </div>
            <div class="card-body">
              @foreach ($users as $user)
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                      <div class="row mb-1">
                        <div class="col-md-6 col-sm-12">
                          <label for="nombre">Nombres</label>
                        <input type="text" class="form-control form-control-sm " id="nombre" name="nombre" value="{{$user->nombre}}">
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <label for="apellido">apellidos</label>
                          <input type="text" class="form-control form-control-sm" id="apellido" name="apellido" value="{{$user->apellido}}">
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
                              <input type="text"  class="form-control form-control-sm" name="direccion" id="direccion" value="{{$user->direcccion}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <label for="nick">Nick</label>
                              <input type="text" class="form-control form-control-sm" id="nick" name="nick" value="{{$user->nick}}">
                            </div>
                          </div>
                          <div class="row mt-1">
                              <div class="col">
                                  <label for="contra">Contraseña</label>
                                  <input type="password" class="form-control form-control-sm" id="contra" name="contra" >
                              </div>
                              <div class="col">
                                  <label for="recontra">Confirmacionde contraseña</label>
                                  <input type="password" class="form-control form-control-sm" id="recontra" name="recontra">
                              </div>
                            </div>
                            <button type="submit"  class="btn btn-success mt-2">ACTUALIZAR</button>
                    </form>
              
           @endforeach

            </div>
          </div>
        </div>
       </form>
       </div>       
   </div>
@endsection