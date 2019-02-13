@extends("../templates/template")

@section("header")

    <form action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-danger">Logout</button>
    </form>    

@endsection

@section("container")
    
    <h4>Bienvenido {{ auth()->user()->username}}</h4>

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
                                    <option value="">{{ $x->name }} - {{ $x->price }} $</option>        
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
            <form class="ow" action="">
                    
                    @foreach($pack as $x)
                    <label for="">Name: {{$x->name}}</label>
                    <div class="form-group col-md-3">
                        <label for="">Internet</label>
                            @foreach($net as $n)
                                 @if($x->internet_id == $n->id)
                                     <input class="form-control" type="text" readonly value="{{ $n->name }}">
                                 @endif

                                 @if($x->internet_id == NULL)
                                    <input class="form-control" type="text" readonly value="-">
                                 @endif      
                            @endforeach
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Cable</label>
                            @foreach($cable as $c)
                                 @if($x->cable_id == $c->id)
                                     <input class="form-control" type="text" readonly value="{{ $c->name }}">
                                 @endif      
                            @endforeach
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Telephone</label>
                            @foreach($tlf as $t)
                                 @if($x->tlephone_id == $t->id)
                                     <input class="form-control" type="text" readonly value="{{ $t->name }}">
                                 @endif      
                            @endforeach
                    </div>

                    @endforeach

                    
            </form>
        </div>
    </div>

    <div>
        Invoice
    </div>   
@endsection