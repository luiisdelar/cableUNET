@extends("../templates/template")

@section("logo")
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="{!!route('start')!!}">CableUNET
            <img src="{{{ asset('faviconunet.ico') }}}" width="30" height="30" class="d-inline-block align-top" alt="">      
            </a>
        </nav>       
@endsection

@section("header")

    
@endsection

@section("container")

    <div class="card">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/users')}}" method="POST">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username">
                        </div>
                    </div>
                </div>    
                
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="first_name">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="last_name">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6">
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