@extends("../templates/template")

@section("logo")
        <a class="navbar-brand" href="{!!route('admin')!!}">           
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
    
    <br>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Invoices monthly</h3>
        </div>

        <div class="card-body">
            <div class="row ">
                <div class="col">
                    <div class="row justify-content-center">
                        <label><b>User</b></label>                    
                    </div>

                </div>

                <div class="col">
                    <div class="row justify-content-center">
                        <label><b>Pay</b></label>
                    </div>    
                </div>
            </div>    
            @foreach($user as $x)
                
                 <div class="row">
                    <div class="col">
                        <div class="row justify-content-center">
                            <label>{{ $x->username }}</label>
                        </div>    
                    </div>

                    <div class="col">
                    @php
                        $p=App\Packservice::find($x->packservice_id);
                        $c=App\Cable::find($x->cable_id);
                        $i=App\Internet::find($x->internet_id);
                        $t=App\Telephone::find($x->telephone_id);
                        $total=0;
                        if(isset($p)){  $total+=$p->price;  }
                        if(isset($c)){  $total+=$c->price;  }
                        if(isset($i)){  $total+=$i->price;  }
                        if(isset($t)){  $total+=$t->price;  }
                    @endphp
                        <div class="row justify-content-center">
                            <label for="">{{ $total }} $</label>
                        </div>    
                    </div>
                 </div>   
            @endforeach
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        {!! $user->render() !!} 
    </div>
@endsection