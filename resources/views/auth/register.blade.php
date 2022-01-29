<!doctype html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .container-fluid {
      padding:0;
      margin:0;
    }
    .imgside{
        z-index: -1;
        position:absolute;
    }
    @media only screen and (max-width: 800px) {
 .side {
    display: none;
  }
}
    </style>
    
</head>
<body style="background-color: white;overflow-x: hidden;">
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-4 side">
     <a href="{{route('home')}}"><img class="imgside" style="" src="assets/img/signside.png" height="657vh" width="100%" alt=""></a>  

            <div style="text-align: center;margin-top:100px">
             <h1 style="color: white"><b>welcome to <br>Mishaal Student</b></h1>
             <p style="color: white;font-size:17px">Student Meshaal Club<br>
                at the Polytechnic of 
               Ouarzazate, which was<br>
                established on October <br>
               21, 2016.</p>
              <a style="color: white;font-size:20px;padding:10px;border-radius:30px;background:none;border:2px solid white"  href="{{route('login')}}">Sign Up</a>
        
            </div>
           </div>
           
        <div class="col-md-8" >
            <a href="/"><img src="assets/img/logo.png" style="float: right;margin:10px;" width="50px" height="60px" alt=""></a>
            <div style="text-align: center;margin-top:100px;">

            
            <h1 style="margin-bottom:60px;" ><b style="border-bottom:2px solid orange;">Sign Up</b></h1>
            <div class="card" style="border:none">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6" style="margin:0 auto;">
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6" style="margin:0 auto;">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6" style="margin:0 auto;">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6"style="margin:0 auto;">
                                <input id="password-confirm" placeholder="Comfirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="margin:0 auto;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>
