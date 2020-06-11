<html>
<head>
    <link href="/assets/css/login.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body id="LoginForm">

<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Register</h2>
                <p>Please enter email and password</p>
            </div>
            <form id="Register" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Pseudo" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group row">

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group row">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Password confirmation" name="password_confirmation" required>
                </div>



                <br>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-dark btn-block">
                            {{ __('Register') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
