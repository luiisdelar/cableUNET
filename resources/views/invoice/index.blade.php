@extends("../templates/template")

@section("header")
    
@endsection

@section("container")
    <h2>List of users</h2>
    @foreach($user as $x)
        <h5>{{ $x->username }}</h5>
    @endforeach
@endsection