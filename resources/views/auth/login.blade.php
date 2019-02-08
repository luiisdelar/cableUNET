@extends("../templates/template")

@section("header")
    
@endsection

@section("container")

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <h1>Access application</h1>
            
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
                            <button class="btn btn-primary form-control">Register</button>
                   </div> 
                   
                   {{ csrf_field() }}
            </form>
               
        </div>
    </div>        

@endsection