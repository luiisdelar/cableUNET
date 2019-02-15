@extends("../templates/template")

@section("header")

    <form action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-danger">Logout</button>
    </form>    

@endsection

@section("container")
    
    <h4>Bienvenido {{ auth()->user()->username }}</h4>
    
    <h3>Plans</h3>

    <div class="card">
        <div class="card-header">
            <h5>Select services</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <form class="col-md-4" action="">               
                        <label for="">Cable</label>
                        <div class="form-group">
 
                            <select name="" id="" class="form-control custom-select">
                                @foreach($cable as $x)
                                    @if(auth()->user()->cable_id != $x->id)
                                        <option value="">{{ $x->name }} - {{ $x->price }} $</option>                                    
                                    @endif
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buy" class="btn btn-primary form-control">
                        </div>                  
                </form>

                <form class="col-md-4" action="">               
                        <label for="">Internet</label>
                        <div class="form-group">
                            <select name="" id="" class="form-control custom-select">
                                @foreach($net as $x)
                                    <option value="">{{$x->name}} - {{$x->speed}}Mb/s - {{$x->price}}$</option>        
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buy" class="btn btn-primary form-control">
                        </div> 
                </form>

                <form class="col-md-4" action="">               
                        <label for="">Telephone</label>
                        <div class="form-group">
                            <select name="" id="" class="form-control custom-select">
                                @foreach($tlf as $x)
                                    <option value="">{{$x->name}} - {{$x->minutes}} minutes - {{$x->price}}$</option>        
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buy" class="btn btn-primary form-control">
                        </div> 
                </form>

            </div>     
        </div>

    </div>

    <hr>

    <div class="card">
        <div class="card-header">
            <h5>Select package</h5>
        </div>

        <div class="card-body">
            <form action="#" method="POST"> 
                    
                    @foreach($pack as $x)
                    <h4>Name: {{$x->name}}</h4>
                    
                    <div class="row">

                        <div class="form-group col-md-3">
                            
                            <label for="">Internet</label>
                                @if($x->internet_id == NULL)
                                        <input class="form-control" type="text" readonly value="-">
                                @endif

                                @foreach($net as $n)

                                    @if($x->internet_id == $n->id)
                                        <input class="form-control" type="text" readonly value="{{$n->name}} - {{$n->speed}}Mb/s - {{$n->price}}$">
                                    @endif
      
                                @endforeach
                        
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Cable</label>
                                @if($x->cable_id == NULL)
                                    <input class="form-control" type="text" readonly value="-">
                                @endif
                                
                                @foreach($cable as $c)

                                    @if($x->cable_id == $c->id)
                                        <input class="form-control" type="text" readonly value="{{$c->name}} - {{$c->price}}$"> 
                                    @endif

                                @endforeach
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Telephone</label>
                                @if($x->telephone_id == NULL)
                                    <input class="form-control" type="text" readonly value="-">
                                @endif

                                @foreach($tlf as $t)
                                    @if($x->telephone_id == $t->id)
                                        <input class="form-control" type="text" readonly value="{{$t->name}} - {{$t->minutes}} minutes - {{$t->price}}$">
                                    @endif      
                                @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        @if(auth()->user()->packservice_id == $x->id)
                            <input type="submit" value="Actuel" disabled class="btn btn-primary">
                        @else
                            <input type="submit" value="Buy" class="btn btn-primary">
                        @endif
                    </div>    
                    <hr>
                    @endforeach

                    
            </form>
        </div>
    </div>

    <div>
        Invoice
    </div>   
@endsection