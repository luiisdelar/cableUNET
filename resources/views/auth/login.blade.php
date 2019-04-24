@extends("../templates/template")

@section("logo")
        <a class="navbar-brand" href="{!!route('start')!!}">
@endsection

@section("header")
       <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item active">
                      <a class="nav-link" target=blank href="http://www.luisortega.com.ve">>> luisortega.com.ve <<<span class="sr-only">(current)</span></a>
                  </li>
              </ul>
       </div>
@endsection

@section("container")

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">Access Application</h1>
            @include('flash::message')
            <form action="{{ route('login') }}" method="POST">

                   <div class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        <label for="email">Email</label>
                        <input type="email"
                               class="form-control"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="type email">
                        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                   </div>
            <?php /* revisar el css de los errores */ ?>
                   <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Password</label>
                        <input type="password"
                               class="form-control"
                               name="password"
                               placeholder="type password">
                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}                
                   </div>

                   <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" value="Log in">
                   </div> 
                   
                   
                   <div class="form-group">
                   <input class="btn btn-primary form-control" type="button" value="Register" onclick="location.href='{!!route('user/create')!!}';">  
                   </div> 
                   
                   {{ csrf_field() }}
            </form>
               
        </div>
    </div>        

@endsection