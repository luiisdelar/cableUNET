@extends("../templates/template")

@section("logo")
        <a class="navbar-brand" href="{!!route('start')!!}">
@endsection

@section("header")

    
@endsection

@section("container")
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Register</h4>
        </div>

        @include('flash::message')

        <div class="card-body">
            <form action="{{url('/users')}}" method="POST">

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email">
                        </div>
                    </div>
                
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

                <div class="row justify-content-center"> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username">
                        </div>
                    </div>
               
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input class="btn btn-primary form-control" type="submit" value="Submit">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary form-control" type="button" value="Back" onclick="location.href='{!!route('start')!!}';">
                        </div>
                    </div>
                </div>   

                {{ csrf_field() }}
                
            </form>
        </div>
    </div>

@endsection 