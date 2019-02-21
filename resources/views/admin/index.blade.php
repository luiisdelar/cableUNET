@extends("../templates/template")

@section("logo")
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="{!!route('admin')!!}">CableUNET
            <img src="{{{ asset('faviconunet.ico') }}}" width="30" height="30" class="d-inline-block align-top" alt="">      
            </a>
        </nav>       
@endsection

@section("header")
    <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
        
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Admin: {{ auth()->user()->username}} <span class="sr-only">(current)</span></a>
                  </li>
                  
              </ul>
    </div>
    
    <form action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-danger">Logout</button>
    </form>   

     
@endsection

@section("container")

    <div class="title" style="background: gray;">
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
                    <select class="form-control" name="cable_id">
                        <option value="">---select a plan---</option>
                        @foreach($cable as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                        @endforeach
                    </select>           
                </div>

                <div class="col-md-4">
                    <label>Internet</label>
                    <select class="form-control" name="internet_id">
                        <option value="">---select a plan---</option>
                        @foreach($net as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                        @endforeach
                    </select>           
                </div>

                <div class="col-md-4">
                    <label>Telephone</label>
                    <div class="form-group">
                        <select class="form-control" name="telephone_id">
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
            </div>

            <div class="form-group">
                <input type="submit" value="Create" class="btn btn-primary" required>
            </div>

            {{ csrf_field() }}

        </form>
    </div>

    <hr>

    <div class="card">
        <div class="card-header">
            <h4>Loading Programation</h4>
        </div>

        <form class="card-body" action="{{ route('programation/store')}}" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <label>Channel</label>
                    <select name="channel_id" class="form-control">
                        <option value="">---select a channel---</option>
                        @foreach($cha as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>        
                        <input type="text" placeholder="name" name="name" required class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Day</label>
                        <select name="day" class="form-control">
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thursday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7">Sunday</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Start hour</label>
                        <input class="form-control" type="number" required name="start_hour">            
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>End hour</label>
                        <input class="form-control" type="number" required name="end_hour">            
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Load">
            </div>

            {{ csrf_field() }}

        </form>
    </div>
    
    <form action="{{ route('invoice/store') }}" method="POST">
        <div class="row">
            <div class="col-md-4">               
                <div class="form-group">
                    <h3>Invoices</h3>
                    <input class="btn btn-primary" type="submit" value="List of invoices">
                </div>
            </div>
        </div>

        {{ csrf_field() }}

    </form>

    <h3>Change plans</h3>
    <form action="{{ route('admin/plans') }}" method="POST">

        <div class="row">
            <input type="submit" value="Change of plans" class="btn btn-primary">
        </div>

        {{ csrf_field() }}

    </form>

    <h3>Admin users</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
        </div>

        {{ csrf_field() }}

    </form>
@endsection    