@extends("../templates/template")

@section("header")
    
@endsection

@section("container")
    <h3>Hi user</h3>
    <h4>Bienvenido {{ auth()->user()->username}}</h4>

    <form action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-danger">Logout</button>
    </form>
@endsection