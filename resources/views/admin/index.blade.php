@extends("../templates/template")

@section("logo")
    <a class="navbar-brand" href="{!!route('admin')!!}">       
@endsection

@section("header")
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="navbar-nav row">
                <div class="col-md form-group">
                    <input type="button" class="btn form-control" value="Admin: {{ auth()->user()->username }}">
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

    <div class="title">
        <h1 class="text-center">Secction of Administration and Creation</h1>
    </div>

    @include('flash::message')
    
    <div class="card">  
    
        <div class="card-header">
            <h4>Cable</h4>
        </div>
        
        <form class="card-body" action="{{ route('cable/store')}}" method="POST">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" required type="text" placeholder="name" name="name">    
                    </div>
                </div>

                <div class="col-md-4">        
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" required type="number" placeholder="price $" name="price">
                    </div>            
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" required value="Create">
            </div>     

            {{ csrf_field() }}
            
        </form>
    </div>
    
    <hr>
    
    <div class="card">

        <div class="card-header">
            <h4>Internet</h4>
        </div>
        
        <form class="card-body" action="{{ route('internet/store')}}" method="POST">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" required placeholder="name" name="name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Velocity</label>
                        <input class="form-control" type="number" required placeholder="velocity" name="speed">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="number" required placeholder="price $" name="price">
                    </div>
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" required value="Create">
            </div>

            {{ csrf_field() }}

        </form>

    </div>

    <hr>
        
    <div class="card">
    
        <div class="card-header">
            <h4>Telephone</h4>
        </div>

        <form class="card-body" action="{{ route('telephone/store')}}" method="POST">
                
            <div class="row">   
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" class="form-control" required type="text" placeholder="name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Minutes</label>
                        <input name="minutes" class="form-control" required type="number" placeholder="minutes">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input name="price" class="form-control" required type="number" placeholder="price $">
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Create" required>    
            </div>

            {{ csrf_field() }}

        </form>
    </div>

    <hr>

    <div class="card">
        
        <div class="card-header">
            <h4>Package Services</h4>
        </div>

        <form class="card-body" action="{{ route('admin') }}" method="POST">

            <div class="row">
                <div class="col-md-4">
                    <label>Name</label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="name" placeholder="name">
                    </div>
                </div>
            </div>      

            <div class="row">

                <div class="col-md-4">
                    <label>Cable</label>
                    <select class="form-control custom-select" name="cable_id">
                        <option value="">---select a plan---</option>
                        @foreach($cable as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                        @endforeach
                    </select>           
                </div>

                <div class="col-md-4">
                    <label>Internet</label>
                    <select class="form-control custom-select" name="internet_id">
                        <option value="">---select a plan---</option>
                        @foreach($net as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                        @endforeach
                    </select>           
                </div>

                <div class="col-md-4">
                    <label>Telephone</label>
                    <div class="form-group">
                        <select class="form-control custom-select" name="telephone_id">
                            <option value="">---select a plan---</option>
                            @foreach($tlp as $x)
                                <option value="{{$x->id}}">{{$x->name}}</option>
                            @endforeach
                        </select>
                    </div>           
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Create" required>
            </div>

            {{ csrf_field() }}

        </form>
    </div>

    <hr>

    <div class="card">
        <div class="card-header">
            <h4>Loading Channels</h4>
        </div>
        
        <form class="card-body" action="{{ route('channel/store')}}" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <label>Name</label>
                    <div class="form-group">
                        <input type="text" placeholder="name" name="name" required class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <label>Category</label>
                    <div class="form-group">
                        <select class="form-control" name="stars">
                            <option value="1">X</option>
                            <option value="2">X X</option>
                            <option value="3">X X X</option>
                            <option value="4">X X X X</option>
                            <option value="5">X X X X X</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Create" class="btn btn-primary" required>
            </div>

            {{ csrf_field() }}

        </form>
    </div>

    <hr>
@endsection    