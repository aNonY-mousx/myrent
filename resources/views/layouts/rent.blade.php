<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<title> @yield('title') </title>
	<style type="text/css">
		/*html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }*/


		.sth{
			background: linear-gradient( rgba(0, 0, 0, 0.42), rgba(0, 0, 0, 0.62) ), url(' {{ asset('images/14.jpg')}} ');
			border-radius: 5px;
			
		}
		
		/*for screen with size 640 and up (ie for larger screens)*/
		@media screen and (min-width: 640px){
			.sth{
				height: 500px
			}
		}

		.myclass{
			background-color: #eee;
			margin:3%;
			padding:1%;
			border-radius: 8px;

		}
		body{
			    font-family: "proxima-nova",sans-serif;

		}
		 /* Remove the navbar's default margin-bottom and rounded borders */ 
        .navbar {
          margin-bottom: 0;
          border-radius: 0;
        }
        
        /* Add a gray background color and some padding to the footer */
        footer {
          background-color: #f2f2f2;
          padding: 25px;
        }

		
	</style>
	@yield('styles')

</head>

<body>

<!-- navigation bar  -->
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target="#thenavbarmenu">
			<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
       		<span class="icon-bar"></span> 
		</button>
		<a class="navbar-brand" href="#" >
			<span class="glyphicon glyphicon-road"></span>Y rEnT</a>
	</div>
	<div class="collapse navbar-collapse" id="thenavbarmenu">
	<ul class="nav navbar-nav">
	 <li><a href="#">Home</a></li>
	 <li><a href="">About</a></li>
	 <!-- <li><a href="">Profile</a></li> -->
	</ul>
	<ul class="nav navbar-nav pull-right">
		
		@guest
		<li>
			<a style="margin-right: 2px;" data-toggle="modal" data-target="#loginmodal">
				<span class="glyphicon glyphicon-log-in"></span> Login
			</a></li>
			<li>
			<a href ="{{route('register')}}" style="margin-right: 2px;">
				<span class="glyphicon glyphicon-log-in"></span> Register
			</a></li>

		@else

			 <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

		@endguest
	 </ul>
	</div>
</nav>
<!-- end of navigation bar -->

@guest
<!-- Login modal called when login button clicked -->
<div id="loginmodal" class="modal fade">
	<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3  class="modal-title">Login</h3>
		</div>
		<div class="modal-body">
		<form action="{{ route('login') }}"  method="post">
			{{ csrf_field() }}
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="email" class="form-control"/>
			@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
			</div>
			
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password"  name="password" class="form-control" />
			@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
			</div><br>                     
             <div class="checkbox">
                       <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                       </label>
                               </div>                       
         
			<button type ="submit" class="btn btn-success">Login</button>
			<a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
            </a>
		</form>
		</div>
	</div>
	</div>
</div>
<!-- End Of Login Modal -->
@endguest



@yield('content')



<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@yield('scripts')

</body>

</html>