@extends("../templates/template")

@section("logo")
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="{!!route('admin')!!}">CableUNET
            <img src="{{{ asset('faviconunet.ico') }}}" width="30" height="30" class="d-inline-block align-top" alt="">      
            </a>
        </nav>       
@endsection


@section("header")
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="navbar-nav row">
                <div class="col-md form-group">
                    <input type="button" class="btn form-control " value="Admin: {{ auth()->user()->username }}">
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

@endsection    