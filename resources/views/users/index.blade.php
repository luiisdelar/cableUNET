@extends("../templates/template")

@section("logo")
        <a class="navbar-brand" href="{!!route('user')!!}">       
@endsection

@section("header")
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav row">
                
                <div class="col-md">
                    <form action="{{ route('user') }}" method="GET">
                        <div class="form-group">
                            <input readonly type="button" value="User: {{ auth()->user()->username }}" class="btn form-control">
                        </div>
                        {{ csrf_field() }}
                    </form>    
                </div>

                <div class="col-md">
                    <div class="form-group">    
                    @php
                        $p=App\Packservice::find(auth()->user()->packservice_id);
                        $c=App\Cable::find(auth()->user()->cable_id);
                        $i=App\Internet::find(auth()->user()->internet_id);
                        $t=App\Telephone::find(auth()->user()->telephone_id);
                        $pch=App\Packchannel::find(auth()->user()->packchannel_id);
                        $total=0;
                        if(isset($pch)){  $total+=$pch->price;  }
                        if(isset($p)){  $total+=$p->price;  }
                        if(isset($c)){  $total+=$c->price;  }
                        if(isset($i)){  $total+=$i->price;  }
                        if(isset($t)){  $total+=$t->price;  }
                    @endphp
                                
                    @if($total)
                        <input readonly class="btn form-control" value="Invoice: {{$total}} $">
                    @else
                        <input readonly class="btn form-control" value="Invoice: {{$total}} $">
                    @endif    
                    </div>       
                </div>    

                <div class="col-md">
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger form-control" value="Logout">
                        </div>
                    </form>      
                </div>

        </ul>
    </div>
     
@endsection


@section("container")
    
    
 
    <h2 class="text-center">Plans</h2>
    @include('flash::message')
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
                                        {!! $cc="Active: $x->name"; !!}
                                    @endif   
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buy" class="btn btn-primary form-control">
                        </div> 

                    @if(isset($cc))
                        <div class="alert alert-success" role="alert">
                            {{ $cc }}
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

    @if(isset(auth()->user()->cable_id))

        <div class="card">
            <div class="card-header">
                <h3>Package of channels</h3>
            </div>
 
            <div class="card-body">
            
                <div class="form-group"> 
                <form action="{{ route('users/packchannel') }}"  method="POST">
                    @php
                        $ayuda=App\Cable::find(auth()->user()->cable_id)->packchannels;
                    @endphp

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name='5'>
                                <label>X X X X X</label>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control" name="" id="">
                                <option value="">-- Channels --</option>
                                    @foreach($cha as $chh)
                                        @if($chh->stars==5)
                                            <option value="">
                                                {{ $chh->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name='4'>
                                <label for="">X X X X</label>
                            </div>
                            
                            <div class="col-md-3">
                                <select class="form-group form-control" name="" id="">
                                    <option value="">-- Channels --</option>
                                    @foreach($cha as $chh)
                                        @if($chh->stars==4)
                                            <option value="">
                                                {{ $chh->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name='3'>
                                <label for="">X X X</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-group form-control" name="" id="">
                                    <option value="">-- Channels --</option>
                                    @foreach($cha as $chh)
                                        @if($chh->stars==3)
                                            <option value="">
                                                {{ $chh->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name='2'>
                                <label for="">X X</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-group form-control" name="" id="">
                                    <option value="">-- Channels --</option>
                                    @foreach($cha as $chh)
                                        @if($chh->stars==2)
                                            <option value="">
                                                {{ $chh->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <input type="radio" name='1'>
                                <label for="">X</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-group form-control" name="" id="">
                                    <option value="">-- Channels --</option>
                                    @foreach($cha as $chh)
                                        @if($chh->stars==1)
                                            <option value="">
                                                {{ $chh->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            
                    </div>
                    
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Buy">
                    </div>
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    
                    @if(isset(auth()->user()->packchannel_id))
                        <div class="alert alert-success" role="alert">
                            @php
                                $msg=App\Packchannel::find(auth()->user()->packchannel_id);
                            @endphp
                            Package active: {{ $msg->name }}
                        </div>
                    @endif
                    {{ csrf_field() }}
                </form>
                </div>
            </div>
        </div>
    @endif

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

@endsection