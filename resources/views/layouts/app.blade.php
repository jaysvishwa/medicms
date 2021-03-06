<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{URL::to('/')}}/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href="{{URL::to('/')}}/public/css/main.css" rel="stylesheet">


    <style>
        .my-add-new-button{
            margin-top: -3px;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('home')}}">{{config('app.name')}}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    @guest
                    @else
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Patients <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">Appoitments <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">Reports <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">Disease Symptoms <span class="sr-only">(current)</span></a></li>               
                        </ul>
                    @endguest

                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->firstname.' '.Auth::user()->lastname  }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Dashboard</a></li>                   
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            </li>
                        @endguest              
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        
        <div class="container">
            
            <!--Error list-->          
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!--Patient addition success message-->
            @if(session()->has('patientmessage'))
                <div class="alert alert-success">{{session()->get('patientmessage')}}</div>
            @endif

            @section("body")
            @show

             @section("new_body")
            @show

        
         


        </div>
        
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{URL::to('/')}}/public/js/jquery.js"></script>	
	<script src="{{URL::to('/')}}/public/js/bootstrap.min.js"></script>
    <script src="{{URL::to('/')}}/public/js/main.js"></script>

</body>
</html>
