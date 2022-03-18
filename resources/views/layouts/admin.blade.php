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
						<a href="index.html" class="logo">Povami Software <span>Abdulrahman ismael</span></a>
					</h4>
					<ul class="list-unstyled components mb-5">
						<li class="{{  request()->routeIs('dashboard') ? 'active' : '' }}">
							<a href="{{route("dashboard")}}"> <i class="fa-solid fa-gauge"></i>  Dashboard </a>
						</li>
						<li class="{{  request()->routeIs('users.*') ? 'active' : '' }}">
							<a href="{{route("users.index")}}"> <i class="fa-solid fa-user"></i>  Users </a>
						</li>
						<li>
							<a href="#"><span class="fa fa-briefcase mr-3"></span> Works</a>
						</li>
						<li>
							<a href="#"><span class="fa fa-sticky-note mr-3"></span> Blog</a>
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
	<!-- JQUERY Framwork-->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"
		integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

	<!-- bootstrap Framwork-->
	<script src="{{ asset('js/bootstrap.js') }} "></script>

	<!-- admin Framwork-->
	<script src="{{ asset('js/admin.js') }} "></script>

	<!-- custom Framwork-->
	<script src="{{ asset('js/custom.js') }} "></script>
</body>

</html>