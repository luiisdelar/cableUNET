@extends("../templates/template")

@section("header")

@endsection

@section("container")
    <h1 class="text-center">Secction of Administration</h1>
    
    <h3>Cable</h3>
    <form action="{{url('/admin/cable')}}" method="POST">

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" placeholder="name" name="name">    
                </div>
            </div>

            <div class="col-md-4">        
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" value="price $" name="price">
                </div>            
            </div>

        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Create">
        </div>     

        {{ csrf_field() }}
        
    </form>

    <h3>Internet</h3>
    <form action="">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Velocity</label>
                    <input class="form-control" type="number" placeholder="velocity">
                </div>
            </div>

            <div class="col-md-4">
                <label>Name</label>
                <input class="form-control" type="text" placeholder="name">
            </div>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Create">
        </div>
    </form>

    <h3>Telephone</h3>
    <form action="">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Minutes</label>
                    <input class="form-control" type="text" placeholder="minutes">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" placeholder="name">
                </div>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Create">    
    </form>
  
    <h3>Package Services</h3>
    <form action="">
        <div class="row">
    
            <div class="col-md-4">
                
                <label>Internet</label>
                <select class="form-control">
                    <option value="">---select a plan---</option>
                    @foreach($net as $x)
                        <option value="">{{$x->name}}</option>
                    @endforeach
                </select>
           
            </div>
        </div>
    </form>
    

    <h3>Loading Channels</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
        </div>
    </form>

    <h3>Loading Programation</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
        </div>
    </form>

    <h3>Invoices</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
        </div>
    </form>

    <h3>Change plans</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
        </div>
    </form>

    <h3>Admin users</h3>
    <form action="">
        <div class="row">
            <h4>-----------------------</h4>
        </div>
    </form>
@endsection    