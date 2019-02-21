@extends("../templates/template")

@section("logo")
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="{!!route('user')!!}">CableUNET
            <img src="{{{ asset('faviconunet.ico') }}}" width="30" height="30" class="d-inline-block align-top" alt="">      
            </a>
        </nav>       
@endsection

@section("header")

    <form action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-danger">Logout</button>
    </form>    

@endsection

@section("container")
    
    <h4>Bienvenido {{ auth()->user()->username }}</h4>
    @include('flash::message')
    <h3>Plans</h3>

    <div class="card">
        <div class="card-header">
            <h5>Select services</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <form class="col-md-4" action="{{ route('plan/store')}}" method="POST">               
                        <label for="">Cable</label>
                        <div class="form-group">
 
                            <select name="cable" class="form-control custom-select">
                                @foreach($cable as $x)
                                    @if(auth()->user()->cable_id != $x->id)
                                        <option value="{{$x->id}}">{{ $x->name }} - {{ $x->price }} $</option>                                    
                                    @else
                                        {!! $a="Active: $x->name"; !!}
                                    @endif 
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buy" class="btn btn-primary form-control">
                        </div>

                        @if(isset($a))
                            <div class="alert alert-success" role="alert">
                                {{ $a }}
                            </div>
                        @endif

                        @foreach($plan as $p)
                            @if($p->user_id == auth()->user()->id && isset($p->cable_id))
                                <div class="alert alert-danger" role="alert">
                                    @php
                                        $aux=App\Cable::find($p->cable_id);
                                        echo "Waiting for authorization: " . $aux->name;
                                    @endphp
                                </div>
                            @endif
                        @endforeach

                        {{ csrf_field() }} 
                </form>

                <form class="col-md-4" action="{{ route('plan/store') }}" method="POST">               
                        <label for="">Internet</label>
                        <div class="form-group">
                            <select name="internet"  class="form-control custom-select">
                                @foreach($net as $x)
                                    @if(auth()->user()->internet_id != $x->id)
                                        <option value="{{$x->id}}">{{$x->name}} - {{$x->speed}}Mb/s - {{$x->price}}$</option>        
                                    @else
                                        {!! $b="Active: $x->name"; !!}
                                    @endif    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buy" class="btn btn-primary form-control">
                        </div>

                        @if(isset($b))
                            <div class="alert alert-success" role="alert">
                                {{ $b }}
                            </div>
                        @endif

                        @foreach($plan as $p)
                            @if($p->user_id == auth()->user()->id && isset($p->internet_id))
                                <div class="alert alert-danger" role="alert">
                                    @php
                                        $aux=App\Internet::find($p->internet_id);
                                        echo "Waiting for authorization: " . $aux->name;
                                    @endphp
                                </div>
                            @endif
                        @endforeach
 
                        {{ csrf_field() }}
                </form>

                <form class="col-md-4" action="{{ route('plan/store') }}" method="POST">               
                        <label for="">Telephone</label>
                        <div class="form-group">
                            <select name="telephone" class="form-control custom-select">
                                @foreach($tlf as $x)
                                    @if(auth()->user()->telephone_id != $x->id)
                                        <option value="{{$x->id}}">{{$x->name}} - {{$x->minutes}} minutes - {{$x->price}}$</option>        
                                    @else
                                        {!! $c="Active: $x->name"; !!}
                                    @endif   
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buy" class="btn btn-primary form-control">
                        </div> 

                    @if(isset($c))
                        <div class="alert alert-success" role="alert">
                            {{ $c }}
                        </div>
                    @endif

                    @foreach($plan as $p)
                            @if($p->user_id == auth()->user()->id && isset($p->telephone_id))
                                <div class="alert alert-danger" role="alert">
                                    @php
                                        $aux=App\Telephone::find($p->telephone_id);
                                        echo "Waiting for authorization: " . $aux->name;
                                    @endphp
                                </div>
                            @endif
                    @endforeach
                    
                    {{ csrf_field() }}    
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
                    
                    @foreach($pack as $x)
            <form action="{{ route('plan/store') }}" method="POST"> 
                    <h4>Name: {{$x->name}}</h4>
                   
                    <div class="row">

                        <div class="form-group col-md-3">
                            
                            <label>Internet</label>
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
                            <input type="submit" value="Active" disabled class="btn btn-primary">
                        @else
                            <input type="hidden" name="pack" value="{{$x->id}}">   
                            <input type="submit" value="Buy" class="btn btn-primary">
                        @endif
                    </div>    
                    <hr>
                    {{ csrf_field() }}    
            </form>
                    @endforeach

        </div>
    </div>

    <div>
        Invoice
    </div>   
@endsection