@extends("../templates/template")

@section("header")

@endsection

@section("container")
    
    <form action="{{url('/users')}}" method="POST">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email">
                </div>
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-4">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="first_name">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="last_name">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <input class="form-control" type="submit" value="Accept">
            </div>
        </div>   

        {{ csrf_field() }}
        
    </form>

@endsection