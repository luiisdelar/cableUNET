@extends("../templates/template")

@section("header")

@endsection

@section("container")
    <h1>Hablen claro que estoy register a user xd</h1>
    <form action="/users" method="POST">
        <label>Username:</label>
        <input type="text"><br>
        {{csrf_field()}}
        <input type="submit" value="Accept">       
    </form>
@endsection