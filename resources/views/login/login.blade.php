@extends('welcome')
@section('content')
<div class="container w-25 my-4 shadow">
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('show',1)}}" method="post">
            @csrf
                <div class="form-group">
                    <h3 class="text-center text-uppercase"> Login</h3>
                </div>
                <div class="form-group">
                    <input name="nick"type="text" class="form-control" placeholder="Nick">
                </div>
                <div class="form-group">
                    <input name="pass" id="pass" type="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <select name="rol" id="rol" class="form-control">
                        @foreach($login as $user) 
                        <option value="{{ $user->id}}">{{$user->rol}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection