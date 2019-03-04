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
    @include('flash::message')
    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Cable</th>
                    <th>Internet</th>
                    <th>Telephone</th>
                    <th>Package services</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach($plans as $plan)
                    <tr>

                        @php
                            $us=App\User::find($plan->user_id);
                        @endphp

                        <td>
                            {{ $us->username }}
                        </td>

                        <td>
                            <div class="row">
                                <form action="{{ route('admin/plans/accept') }}" method="POST">
                                <div class="col-md-6">
                                    @if($us->cable_id)
                                        Actual: @php $cab=App\Cable::find($us->cable_id); @endphp
                                        {{ $cab->name }}
                                    @else
                                        Actual: None
                                    @endif
                                    <br>
                                    @if($plan->cable_id)
                                        New: @php $new=App\Cable::find($plan->cable_id); @endphp
                                        {{ $new->name }}
                                        <input type="hidden" value="{{$new->id}}" name="cable_id">
                                        <input type="hidden" value="{{$us->id}}" name="user_id">
                                        <input type="hidden" value="{{$plan->id}}" name="plan_id">
                                        </div>
                                        <div class="col-md">
                                            <input type="submit" class="btn btn-primary" value="Change">
                                        </div>
                                    @else
                                        </div>
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            </div> 
                        </td>

                        <td>
                            <div class="row">
                            <form action="{{ route('admin/plans/accept') }}" method="POST">
                                <div class="col-md-6">
                                    @if($us->internet_id)
                                        Actual: @php $int=App\Internet::find($us->internet_id); @endphp
                                        {{ $int->name }}
                                    @else
                                        Actual: None
                                    @endif
                                    <br>
                                    @if($plan->internet_id)
                                        New: @php $new=App\Internet::find($plan->internet_id); @endphp
                                        {{ $new->name }}
                                        <input type="hidden" value="{{$new->id}}" name="internet_id">
                                        <input type="hidden" value="{{$us->id}}" name="user_id">
                                        <input type="hidden" value="{{$plan->id}}" name="plan_id">
                                        </div>
                                        <div class="col-md">
                                            <input type="submit" class="btn btn-primary" value="Change">
                                        </div>
                                    @else
                                        </div>
                                    @endif
                            </div>
                            {{ csrf_field() }}
                            </form>
                        </td>

                        <td>
                            <div class="row">
                            <form action="{{ route('admin/plans/accept') }}" method="POST">
                                <div class="col-md-6">
                                    @if($us->telephone_id)
                                        Actual: @php $tel=App\Telephone::find($us->telephone_id); @endphp
                                        <br>
                                        {{ $tel->name }}
                                    @else
                                        Actual: None
                                    @endif
                                    <br>
                                    @if($plan->telephone_id)
                                        New: @php $new=App\Telephone::find($plan->telephone_id); @endphp
                                        {{ $new->name }}
                                        <input type="hidden" value="{{$new->id}}" name="telephone_id">
                                        <input type="hidden" value="{{$us->id}}" name="user_id">
                                        <input type="hidden" value="{{$plan->id}}" name="plan_id">
                                        </div>
                                        <div class="col-md">
                                            <input type="submit" class="btn btn-primary" value="Change">
                                        </div>
                                    @else
                                        </div>
                                    @endif
                            </div>
                            {{ csrf_field() }}
                            </form>
                        </td>

                        <td>
                            <div class="row">
                            <form action="{{ route('admin/plans/accept') }}" method="POST">
                                <div class="col-md-6">
                                    @if($us->packservice_id)
                                        Actual: @php $pac=App\Packservice::find($us->packservice_id); @endphp
                                        <br>
                                        {{ $pac->name }}
                                    @else
                                        Actual: None
                                    @endif
                                    <br>
                                    @if($plan->packservice_id)
                                        New: @php $new=App\Packservice::find($plan->packservice_id); @endphp
                                        {{ $new->name }}
                                        <input type="hidden" value="{{$new->id}}" name="packservice_id">
                                        <input type="hidden" value="{{$us->id}}" name="user_id">
                                        <input type="hidden" value="{{$plan->id}}" name="plan_id">
                                        </div>
                                        <div class="col-md">
                                            <input type="submit" class="btn btn-primary" value="Change">
                                        </div>
                                    @else
                                        </div>
                                    @endif
                            </div>
                            {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>

                    
    </div>                


@endsection