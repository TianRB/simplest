<!DOCTYPE html>
<html lang="es" class="perfect-scrollbar-off">
<head>
	{{--
	|--------------------------------------------------------------------------
	| Meta
	|--------------------------------------------------------------------------
	--}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
	<link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
	<title>@yield('title', 'Simplest')</title>

	{{--
	|--------------------------------------------------------------------------
	| Fonts
	|--------------------------------------------------------------------------
	--}}
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">

	{{--
	|--------------------------------------------------------------------------
	| Styles
	|--------------------------------------------------------------------------
	--}}
	<!-- Estilo general de Backend -->
	@include('backend.layouts.styles')
	<!-- Estilo específico de página -->
	@yield('local_styles')
</head>

{{--
|--------------------------------------------------------------------------
| Body
|--------------------------------------------------------------------------
--}}
<body class="sidebar-mini">

	{{--
	|--------------------------------------------------------------------------
	| Sidebar
	|--------------------------------------------------------------------------
	--}}
	<div class="wrapper">
		@include('backend.layouts.sidebar')

		{{--
		|--------------------------------------------------------------------------
		| Navigation
		|--------------------------------------------------------------------------
		--}}
		{{-- <div class="row">
			<nav class="row navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
				<div class="container-fluid d-flex align-items-center">
					<div class="navbar-wrapper">
						<div class="navbar-toggle">
							<button type="button" class="navbar-toggler">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
							</button>
						</div>
						<a class="navbar-brand" href="{{route('home')}}">@yield('title', 'Simplest')</a>
					</div>
				</div>
			</nav>
		</div> --}}

		{{--
		|--------------------------------------------------------------------------
		| Content
		|--------------------------------------------------------------------------
		--}}
		<div class="main-panel">
				@yield('content')
		</div>
	</div>

	{{--
	|--------------------------------------------------------------------------
	| Scripts
	|--------------------------------------------------------------------------
	--}}
	<!-- Scripts general de Backend -->
	@include('backend.layouts.scripts')
	<!-- Scripts específicos de página -->
	@yield('local_scripts')
</body>
</html>
