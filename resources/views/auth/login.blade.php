<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('open-iconic/font/css/open-iconic-bootstrap.min.css')}}">
</head>
<body class="h-100 bg-info d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 co-md-4 mx-auto bg-light p-4">
                <h3 class="text-center text-info pb-3 mb-3 border-bottom">Login</h3>
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group p-0 {{ $errors->has('email') ? 'has-error':''}}">
                        <input type="email" name="email" class="form-control form-control-lg mb-3" placeholder="Email" id="email" autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group p-0 {{ $errors->has('password') ? 'has-error': 's'}}">
                        <input type="password" name="password" class="form-control form-control-lg mb-3" placeholder="Password" id="password" autofocus>
                        @if ($errors->has('password'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('password')}}</strong>
                            </span>
                        @endif
                    </div>
                    <input type="submit" value="Login" class="btn btn-info btn-lg btn-block">
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
