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

    <h3>Authorization of Plans</h3>


    @foreach($plans as $plan)

        <div class="card">
            <div class="card-header">
                Requests
            </div>

            <div class="card-body"> 
                <div class="row">
                
                </div>
                <div class="col-md-3">
                    <label>
                    @php
                        $us=App\User::find($plan->user_id);
                    @endphp
                    {{ $us->username }}
                    </label>
                </div>
            </div>
        </div>


    @endforeach

@endsection