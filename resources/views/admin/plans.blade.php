<!--POR HACER: centrar elementos de celdas de la tabla con flexbox-->
@extends("../templates/template")

@section("logo")
       <a class="navbar-brand" href="{!!route('admin')!!}">       
@endsection

@section("header")
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="navbar-nav row">

                <div class="col-md">
                    <form action="{{ route('admin') }}" method="GET">
                        <div class="form-group">
                            <input type="submit" value="Admin: {{ auth()->user()->username }}" class="btn form-control">
                        </div>
                        {{ csrf_field() }}
                    </form>    
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
    
    <div class="title">
        <h3 class="text-center title">Authorization of Plans</h3>
    </div>
    
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

                        <td class="align-items-center">
                            <div >
                                <label>{{ $us->username }}</label>             
                            </div>
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

        <div class="row justify-content-center">
            {!! $plans->render() !!}
        </div>            

    </div>                


@endsection