<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<link href="{{ asset('css/rkm-udb.css') }}" rel="stylesheet">

<!-- Scripts -->
<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    
</head>
<body>
	<div id="app-inner">
		<!-- <nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">-->

		<!-- Collapsed Hamburger -->
		<!-- <button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button> -->

		<!-- Branding Image -->
		<!-- <a class="navbar-brand" href="{{ url('/') }}"> {{
						config('app.name', 'Laravel') }} </a>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse"> -->
		<!-- Left Side Of Navbar -->
		<!-- <ul class="nav navbar-nav">&nbsp;
					</ul> -->

		<!-- Right Side Of Navbar -->
		<!-- <ul class="nav navbar-nav navbar-right"> -->
		<!-- Authentication Links -->
		<!-- @if (Auth::guest())
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li> @else
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false"> {{
								Auth::user()->name }} <span class="caret"></span>
						</a>

							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('logout') }}"
									onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										Logout </a>

									<form id="logout-form" action="{{ route('logout') }}"
										method="POST" style="display: none;">{{ csrf_field() }}</form>
								</li>
							</ul></li> @endif
					</ul>
				</div>
			</div>
		</nav>-->
		<div class="Inner-LayoutInside">
			<nav id="Top-Nav-panel">
				<div
					style="width: 500px; margin-left: 20px; float: left; padding-bottom: 20px;">
					<ul>
						<li><a id="home" @yield('activehome') href="{{ url('/') }}">Home</a></li>
						<li><a id="gallery" @yield('activegallery') href="{{ url('/gallery') }}">Gallery</a></li>
						<li><a id="views" @yield('activeviews') href="{{ url('/views') }}">Views</a></li>
						<li><a id="subscribe" @yield('activesubscribe') href="{{ url('/subscribe') }}">Subscribe</a></li>
						<li><a id="search" @yield('activesearch') href="{{ url('/search') }}">Search</a></li>
						<!-- <li><a href="#about">Sitemap</a></li> -->
						<!-- Authentication Links -->
						@if (Auth::guest())
						<li><a id="login" @yield('activelogin') href="{{ route('login') }}">Login</a></li>
						<!--<li><a id="subscribe" href="{{ route('register') }}">Subscribe</a></li>-->
						@else
						<!-- <li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false"> {{
								Auth::user()->name }} <span class="caret"></span>
						</a>

							<ul class="dropdown-menu" role="menu"> -->
							<li><a id="logout" href="{{ route('logout') }}"
							onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								Logout </a>

							<form id="logout-form" action="{{ route('logout') }}"
								method="POST" style="display: none;">{{ csrf_field() }}</form></li>
							<!-- <li><a id="profile" href="{{ url('/profile') }}"> {{ Auth::user()->firstname }}</a></li>--> <!-- </ul></li> -->
						@endif
					
					</ul>
				</div>
				<div id="Inner-socialMedia">
					<img src="{{asset('images/social-mda-icons.png')}}" border="0"
						usemap="#Map" />
					<map name="Map" id="Map">
						<area shape="circle" coords="16,2,2" href="#" />
						<area shape="rect" coords="-10,0,30,38" href="#" />
						<area shape="rect" coords="28,0,61,32" href="#" />
						<area shape="rect" coords="60,0,97,41" href="#" />
						<area shape="rect" coords="97,0,128,37" href="#" />
						<area shape="rect" coords="128,0,161,25" href="#" />
					</map>
				</div>
			</nav>
			<!--<div id="top-bg">-->
				<div id="white-boxTitle">
					<div id="innertop">
						<!--<div id="RKMlogo"></div>-->
						<div class="InsideTitle">{{ config('app.name', 'Laravel') }}</div>
						@yield('subtitle')						
					</div>
				</div>
				<div id="inner-Conten">
					
							
							<!--<div id="Ebok-icon">
								<img src="images/book_RKM.png" />
							</div>-->
							<!--<div style="padding-top:150px; height:auto">-->
								<!--<p>Search result </p>-->
								<!--<div id="box">-->
									@yield('content')
								<!--</div>-->
							<!--</div>-->
						
					<div id="Ad-space">@yield('ad-space')</div>
				</div>
			</div>
			<div class="footer">Copyright &#x24B8; 2017 by Ramkrishna Math</div>
		<!--</div>-->
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	
	@yield('scripts')
</body>
</html>
