@extends("../templates/template")

@section("header")
    
@endsection

@section("container")
    
    <h1 class="text-center">Secction of Administration</h1>
    
    @include('flash::message')
    
    <h3>Cable</h3>
    <form action="{{url('/admin/cable')}}" method="POST">

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
                    <input class="form-control" required type="number" value="price $" name="price">
                </div>            
            </div>

        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" required value="Create">
        </div>     

        {{ csrf_field() }}
        
    </form>

    <h3>Internet</h3>
    <form action="{{url('/admin/internet')}}" method="POST">
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

    <h3>Telephone</h3>
    <form action="{{url('/admin/telephone')}}" method="POST">
        
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
  
    <h3>Package Services</h3>
    <form action="">
        <div class="row">

            <div class="col-md-4">
                <label>Cable</label>
                <select class="form-control">
                    <option value="">---select a plan---</option>
                    @foreach($cable as $x)
                        <option value="">{{$x->name}}</option>
                    @endforeach
                </select>           
            </div>

            <div class="col-md-4">
                <label>Internet</label>
                <select class="form-control">
                    <option value="">---select a plan---</option>
                    @foreach($net as $x)
                        <option value="">{{$x->name}}</option>
                    @endforeach
                </select>           
            </div>

            <div class="col-md-4">
                <label>Telephone</label>
                <div class="form-group">
                    <select class="form-control">
                        <option value="">---select a plan---</option>
                        @foreach($tlp as $x)
                            <option value="">{{$x->name}}</option>
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
    

    <h3>Loading Channels</h3>
    <form action="">
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

    <h3>Loading Programation</h3>
    <form action="">
        <div class="row">

            <div class="col-md-4">
                <label>Channel</label>
                <select name="" class="form-control">
                    <option value="">---select a channel---</option>
                    @foreach($cha as $x)
                        <option value="">{{$x->name}}</option>
                    @endforeach
                </select>        
            </div>

            <div class="col-md-4">
                <label>Day</label>
                <select name="" class="form-control">
                    <option value="">Lunes</option>
                    <option value="">Martes</option>
                    <option value="">sad</option>
                    <option value="">sdad</option>
                    <option value="">qwert</option>
                    <option value="">sdasc</option>
                    <option value=""></option>
                </select>
            </div>

            <div class="col-md-2">
                <label>Start hour</label>
                <input class="form-control" type="number" required>            
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>End hour</label>
                    <input class="form-control" type="number" required>            
                </div>
            </div>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Load">
        </div>

        {{ csrf_field() }}

    </form>

    <h3>Invoices</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
        </div>

        {{ csrf_field() }}

    </form>

    <h3>Change plans</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
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