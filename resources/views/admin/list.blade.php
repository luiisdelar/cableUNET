@extends("../templates/template")

@section("logo")
        <a class="navbar-brand" href="{!!route('admin')!!}">       
@endsection


@section("header")
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="navbar-nav row">
                
                <div class="col-md">
                    <form action="{{ route('admin') }}" method="GET">
                        <div class="form-group">
                            <input type="submit" value="Admin: {{ auth()->user()->username }}" class="btn form-control">
                        </div>
                        {{ csrf_field() }}
                    </form>    
                </div>

                <div class="col-md">
                    <form action="{{ route('admin/plans') }}" method="GET">
                        <div class="form-group">
                            <input type="submit" value="Change of plans" class="btn btn-primary form-control">
                        </div>
                        {{ csrf_field() }}
                    </form>    
                </div>

                <div class="col-md">
                    <form action="{{ route('invoice') }}" method="GET">
                        <div class="form-group">
                            <input class="btn btn-primary form-control" type="submit" value="List of invoices">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="col-md">
                    <form action="{{ route('members') }}" method="GET">
                        <div class="form-group">
                            <input class="btn btn-success form-control" type="submit" value="Users">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
     
                <div class="col-md">
                    <form action="{{ route('logout') }}" method="POST">
                        <div class="form-group">
                            <input class="btn btn-danger form-control" type="submit" value="Logout">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
        </div>
    </div>
     
@endsection

@section("container")

    <br>

    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Users</h3>
        </div>

        <div class="card-body">
            @foreach($us as $user)
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                            @if(strcmp($user->type,"admin")==0)
                                <input class="btn" type="button" value="Administrator: {{ $user->username }}">        
                            @else
                                <label>User: {{ $user->username }}</label>                            
                            @endif
                         
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row justify-content-center">
                           <form action="{{ route('admin/users/request') }}" method="POST">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" name="user_auth" value="{{ auth()->user()->id }}">
                           @if(strcmp($user->type,"admin")==0)
                                <input type="submit" value="Make User" class="btn btn-warning" name="user">    
                           @else
                                <input type="submit" value="Make Administrator" class="btn btn-success" name="admin">    
                           @endif
                           {{ csrf_field() }}
                           </form>                         
                    </div>
                </div>
            </div>
            <br>
            @endforeach

            <div class="row justify-content-center">
            {{ $us->render() }}
            </div>

        </div>
    </div>

@endsection    