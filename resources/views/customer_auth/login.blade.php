<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Prithy Raj Nag">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=on">
    <title>Login | Admin</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css')}}">
    <style type="text/css">
        html, body {
            height: 100%;
        }
    </style>
</head>


<body class="login-body">
<div class="container">

    <!-- Login Form Start -->
    <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-6 my-auto ">
            <div class="row myShadow">
                <div class="bg-white p-4" style="width: 100%">
                    <h2 class="text-center font-weight-bold text-primary">Sign In</h2>
                    <hr class="my-3"/>
                    @if(session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="text-danger pb-2 ml-3">
                            {{ implode('', $errors->all('Given email or password is incorrect')) }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post" class="px-3" id="login-form">
                        @csrf
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i
                                        class="far fa-envelope fa-lg fa-fw"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control rounded-0"
                                   placeholder="E-Mail" required/>
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control rounded-0"
                                   placeholder="Password" required autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="login-btn" value="Sign In"
                                   class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->
</div>

<!-- Java Script Link -->
{{--    {{ URL::asset('js/jquery.js') }}--}}
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/all.min.js') }}"></script>


</body>
</html>
