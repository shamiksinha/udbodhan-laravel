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
	<div id="app">
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
		<div class="centerLayout">
			<nav id="TopNav-index">
				<div
					style="width: 500px; margin-left: 20px; float: left; padding-bottom: 20px;">
					<ul>
						<li><a id="home" class="active" href="{{ url('/') }}">Home</a></li>
						<li><a id="ebook" href="{{ url('/gallery') }}">Gallery</a></li>
						<li><a id="blog" href="{{ url('/views') }}">Views</a></li>
						<li><a id="subscribe" href="{{ url('/subscribe') }}">Subscribe</a></li>
						<li><a id="search" href="{{ url('/search') }}">Search</a></li>
						<!-- <li><a href="#about">Sitemap</a></li> -->
						<!-- Authentication Links -->
						@if (Auth::guest())
							<li><a id="login" href="{{ route('login') }}">Login</a></li>
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
							<li><a id="profile" href="#"> {{ Auth::user()->name }}</a> <!-- </ul></li> -->
						@endif
					
					</ul>
				</div>
				<div id="socialMedia">
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
			<div id="top-bg">
				<div id="TitlePad">
					<div id="RKMlogo"></div>
					<div class="TitleMain">{{ config('app.name', 'Laravel') }}</div>
					<div class="InsideSubTitle">100 years E-Book for You</div>
				</div>				
				<div id="Ebok-icon"><img src="{{asset('images/book_RKM.png')}}" alt="Search Ebook" border="0" usemap="#Map2" />
				  <map name="Map2" id="Map2">
					<area shape="rect" coords="6,3,123,120" href="{{ url('/search') }}" alt="Search Ebook" />
				  </map>
				</div>
			</div>
			<div id="main-bg">
				<div id="box">@yield('content')</div>
				<div id="BoxPanel">
					<div id="box1">
						<img src="{{asset('images/blog-icon.png')}}" alt="Write your Blog" border="0" usemap="#Map3" />
						<map name="Map3" id="Map3">
							<area shape="rect" coords="-7,-1,101,100" href="{{ url('/views') }}" alt="VIEWS" />
						</map>
						<div style="padding-top:10px;"> <b>Views</b></div>
					</div>
					<div id="box2">
						<img src="{{asset('images/book-icon.png')}}" alt="100 years e-book" border="0" usemap="#Map4" />
						<map name="Map4" id="Map4">
						  <area shape="rect" coords="3,2,98,71" href="{{ url('/search') }}" alt="E-book display" />
						</map>
						<div style="padding-top:15px;"><b>Udbodhat 100 Years</b></div>
					</div>
					<div id="box3">
						<img src="{{asset('images/subscribe-icon.png')}}" alt="Subscribe" border="0" usemap="#Map5" />
						<map name="Map5" id="Map5">
						  <area shape="rect" coords="2,1,98,98" href="{{ url('/subscribe') }}" alt="Subscribe" />
						</map>
						<div style="padding-top:10px;"><b>Subscribe</b></div>
					</div>

				</div>
			</div>
			<div class="footer">Copyright © 2017 by Ramkrish Math</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	
	@yield('scripts')
</body>
</html>
