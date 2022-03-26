<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!------- CSRF Token ------->
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<!------- Title ------->
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!------- IE Compatibility Meta ------->
	<meta http-equiv="X-UA-Compatibale" content="IE-=edge" />

	<!------- Theme Color meta ------->
	<meta name="theme-color" content="#ffffff" />

	<!-- Fav	icon -->
	<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

	<!------- FontAwesome  ------->
	<script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>

	<!------- StyleSheet ------->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body>
	<div id="app" class="admin-view">
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-bars"></i>
						<span class="sr-only">Toggle Menu</span>
					</button>
				</div>
				<div class="p-4">
					<h4>
						<a href="{{route("home")}}" class="logo">
							<img src="{{asset('images/logo_white.png')}}" height="60" alt="Logo">
							<span> 
								<img src="https://lh3.googleusercontent.com/a-/AOh14GgNbBoJKX50lJKU6P0Opn0rX_X56TG0jUO4w7dA=s83-c-mo" width="30" class="rounded" alt=""> 
								{{ Auth::user()->name }}
							</span>
						</a>
					</h4>
					<ul class="list-unstyled components mb-5">
						<li class="{{  request()->routeIs('dashboard') ? 'active' : '' }}">
							<a href="{{route("dashboard")}}"> <i class="fa-solid fa-gauge"></i>  Dashboard </a>
						</li>
						<li class="{{  request()->routeIs('users.*') ? 'active' : '' }}">
							<a href="{{route("users.index")}}"> <i class="fa-solid fa-user"></i>  Users </a>
						</li>
						<li class="{{  request()->routeIs('affiliators.*') ? 'active' : '' }}">
							<a href="{{route("affiliators.index")}}"> <i class="fa-solid fa-users"></i> Affiliators</a>
						</li>
						<li class="{{  request()->routeIs('payment_methods.*') ? 'active' : '' }}">
							<a href="{{route("payment_methods.index")}}"> <i class="fa-solid fa-money-bill-1"></i> Payment Methods</a>
						</li>
						<li class="{{  request()->routeIs('works.*') ? 'active' : '' }}">
							<a href="{{route("works.index")}}"> <i class="fa-solid fa-image"></i> Works </a>
						</li>
						<li>
							<a href="#"><span class="fa fa-suitcase mr-3"></span> Gallery</a>
						</li>
						<li>
							<a href="#"><span class="fa fa-cogs mr-3"></span> Services</a>
						</li>
						<li>
							<a href="#"><span class="fa fa-paper-plane mr-3"></span> Contacts</a>
						</li>
					</ul>
				</div>
			</nav>
	
			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5 pt-5">
		  @yield('content')
			</div>
		</div>
	</div>



	<!-- App JS -->
	<script src="{{ asset('js/app.js') }} "></script>

	
</body>

</html>