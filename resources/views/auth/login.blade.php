<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-xs-12">
                    <form autocomplete="off" method="POST" action="{{ route('auth.login.post') }}">
                    <div class="form-group">
                        <input type="text" name="email" value placeholder="EMAIL" class="login-entradas form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value placeholder="PASSWORD" class="login-entradas form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="ingresar" value="LOGIN" class="login-boton form-control">
                    </div>
                    </form>
                    <div id="errors" class="form-group has-error text-center">
                        @if($errors->has())
                           @foreach ($errors->all() as $error)
                              <div>{{ $error }}</div>
                          @endforeach
                        @endif
                    </div>
                    <div class="text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
