<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<!--<link href="{{ asset('css/rkm-udb.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<noscript><link href="{{ asset('css/rkm-udb.css') }}" rel="stylesheet"></noscript>-->
<style>
html, body  .js {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	padding: 0;
	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */
	color: #000000;
	background-color:#C60;
	background:url(../images/blr-math-bg.webp) no-repeat fixed;
	font-size:12px;
}

html, body, a {
	text-decoration:none;
	color:#000;}
	
.centerLayout
{
  margin: 0 auto;
  width: 862px;
  min-height: 100%;
 
}

.js #RKMlogo {
	background-image:url(../images/RKM-logo-002.webp);
	margin-left:70px;
	width:80px;
	height:86px;
}

.footer {
  position: fixed;
  background-color:#333;
  margin-top:0px;
  height:40px;
  color:#CCC;
  padding-top:8px;
  bottom: 0;
  right: 0;
  left:0;
  width: 100%;
}

#Top-Nav-panel, #TopNav-index{
	width:100%;
	height:40px;
	clear:both;
	padding-bottom:0px;
	background-color:#C60;
	position:fixed;
	margin-top:0px;
		 -moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);
    -webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
    box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);

}

#TopNav-index{
	marker-offset:inherit;
	width:770px;
	margin-right:40px;
	border-radius: 4px;
	}
	
.js #top-bg {
  width: 862px;
  height: 517px;
  background-image:url(../images/RKM-002top-bg.webp);
}

.js #main-bg {
	align-content: center;
	position: inherit;
	padding-bottom:50px;
	padding-top:10px;
	width:780px;
	min-height:100%px;
	background-image:url(../images/RKM-bg-001.webp);
	background-repeat:repeat-y;
}

#box, #boxinsd
{

  width:100%;
  height: auto;
  background-color: #fff;
  border-radius: 6px;
  border: 1px dotted black;
  opacity: 0.5;
  color:#000;
  padding:30px;
  font-size:12px;
  text-align:justify;
}

p::first-letter {
    color: #3330;
    font-size: xx-large;
}

/* main navigation */
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #C60;
	size:300px;
	font-size:12px;
	text-transform:uppercase;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 8px 16px;
    text-decoration: none;
}

a:hover:not(.active) {
    background-color: #666;
	 border-radius: 4px;
}

.active {
background-color: #333;
border-bottom-color:#FFF;
 border-radius: 4px;


}

/* Set up the social media icons and enable transitioning for a smooth hovering effect */
#socialMedia{
	padding-top:5px;
	padding-right:100px;
	margin-right:20px;
	margin-top:0px;
	float:right;
	width:157px;
	height:26px;
	}
	
/*Title*/
#TitlePad{
	padding-top:180px;
	margin-left:380px;
	text-align:left
	
	}

h1 {
	font-family: "Times New Roman", Times, serif;
	font-style:bold;
	font-size:56px;
    color: Black;
    text-shadow: 2px 2px 4px #9d9d9d;
	line-height:10px;
	
}
h2 {
	font-style:normal;
	font-stretch: wider;
	font-size:16px;
	text-indent: 10px;
	line-height:5px;
	}
	
.TitleMain {
	font-family: "Times New Roman", Times, serif;
	/*font-style:bold;*/
	font-weight:bold;
	font-size:56px;
    color: Black;
	padding-top:20px;
    text-shadow: 2px 2px 4px #9d9d9d;
	
}

.InsideSubTitle {
	font-style:normal;
	font-stretch: wider;
	font-size:16px;
	text-indent: 10px;
	padding-top:10px;
	line-height:5px;
	font-weight:bold;
	text-shadow: 2px 2px 4px #9d9d9d;
	}

#Ebok-icon{

	float:left;
	padding-left:450px;
	padding-top:15px;
	height:100;
	width:100;

	}

/* Box shadow */
	
#BoxPanel{
	clear:both;
	padding:20px;
	margin:20px;
	margin-right:50px;
	align-content: center;
	height:250px;
	}
	
#boxshadow, #box1, #box2, #box3 {
	position:absolute;
    -moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);
    -webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
    box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
    padding:8px;
	padding-bottom:50px;
    background: #F0F0F0;
	border-radius: 6px;
}

/* Make the image fit the box */
#boxshadow, #box1, #box2, #box3, img {
    
    width: 100%px;
    border: 0px solid #8a4419;
    border-style: inset;

}


#box1 {
	font-size:16px;
	font-weight:bold;
	margin-left:15px;
	display:block;
    float:left;
    width:150px;
    padding: 6px;
	padding-bottom:50px;
}


#box2 {
    /*display:inline-block;*/
	font-size:16px;
	font-weight:bold;
	margin-left:265px;
	float:left;
    width:150px;
    padding: 6px;
	padding-bottom:50px;
}

#box3 {
	font-size:16px;
	font-weight:bold;
	position:relative;
	float:right;
	width:150px;
    padding: 6px;
	padding-bottom:50px;
}

* {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}


section {
  width: 275px;
  /*background: #ecf0f1;*/
  background: #CAB28B;
  padding: 0 30px 30px 30px;
  margin: 60px auto;
  text-align: center;
  border-radius: 5px;
box-shadow: 2px 2px 5px rgba(0,0,0,.3);
}

h1 {
  font-size: 24px;
  font-weight: 100;
  margin-bottom: 30px;
}

h2 {
  font-size: .75em;
}

a {
  color: #e74c3c;
  text-decoration: none;
  transition: all ease-in-out .2s;
}

a:hover {
  color: #FC0;
}
</style>
<!-- Scripts -->
<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
<script type="text/javascript">
/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-webp-setclasses !*/
!function(e,n,A){function o(e,n){return typeof e===n}function t(){var e,n,A,t,a,i,l;for(var f in r)if(r.hasOwnProperty(f)){if(e=[],n=r[f],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(A=0;A<n.options.aliases.length;A++)e.push(n.options.aliases[A].toLowerCase());for(t=o(n.fn,"function")?n.fn():n.fn,a=0;a<e.length;a++)i=e[a],l=i.split("."),1===l.length?Modernizr[l[0]]=t:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=t),s.push((t?"":"no-")+l.join("-"))}}function a(e){var n=u.className,A=Modernizr._config.classPrefix||"";if(c&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+A+"no-js(\\s|$)");n=n.replace(o,"$1"+A+"js$2")}Modernizr._config.enableClasses&&(n+=" "+A+e.join(" "+A),c?u.className.baseVal=n:u.className=n)}function i(e,n){if("object"==typeof e)for(var A in e)f(e,A)&&i(A,e[A]);else{e=e.toLowerCase();var o=e.split("."),t=Modernizr[o[0]];if(2==o.length&&(t=t[o[1]]),"undefined"!=typeof t)return Modernizr;n="function"==typeof n?n():n,1==o.length?Modernizr[o[0]]=n:(!Modernizr[o[0]]||Modernizr[o[0]]instanceof Boolean||(Modernizr[o[0]]=new Boolean(Modernizr[o[0]])),Modernizr[o[0]][o[1]]=n),a([(n&&0!=n?"":"no-")+o.join("-")]),Modernizr._trigger(e,n)}return Modernizr}var s=[],r=[],l={_version:"3.5.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var A=this;setTimeout(function(){n(A[e])},0)},addTest:function(e,n,A){r.push({name:e,fn:n,options:A})},addAsyncTest:function(e){r.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=l,Modernizr=new Modernizr;var f,u=n.documentElement,c="svg"===u.nodeName.toLowerCase();!function(){var e={}.hasOwnProperty;f=o(e,"undefined")||o(e.call,"undefined")?function(e,n){return n in e&&o(e.constructor.prototype[n],"undefined")}:function(n,A){return e.call(n,A)}}(),l._l={},l.on=function(e,n){this._l[e]||(this._l[e]=[]),this._l[e].push(n),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},l._trigger=function(e,n){if(this._l[e]){var A=this._l[e];setTimeout(function(){var e,o;for(e=0;e<A.length;e++)(o=A[e])(n)},0),delete this._l[e]}},Modernizr._q.push(function(){l.addTest=i}),Modernizr.addAsyncTest(function(){function e(e,n,A){function o(n){var o=n&&"load"===n.type?1==t.width:!1,a="webp"===e;i(e,a&&o?new Boolean(o):o),A&&A(n)}var t=new Image;t.onerror=o,t.onload=o,t.src=n}var n=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],A=n.shift();e(A.name,A.uri,function(A){if(A&&"load"===A.type)for(var o=0;o<n.length;o++)e(n[o].name,n[o].uri)})}),t(),a(s),delete l.addTest,delete l.addAsyncTest;for(var p=0;p<Modernizr._q.length;p++)Modernizr._q[p]();e.Modernizr=Modernizr}(window,document);
</script>
<script>
  document.documentElement.classList.remove("no-js");
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
						<li><a id="gallery"
							@yield('activegallery') href="{{ url('/gallery') }}">Gallery</a></li>
						<li><a id="views" @yield('activeviews') href="{{ url('/views') }}">Views</a></li>
						<li><a id="subscribe"
							@yield('activesubscribe') href="{{ url('/subscribe') }}">Subscribe</a></li>
						<li><a id="search"
							@yield('activesearch') href="{{ url('/search') }}">Search</a></li>
						<!-- <li><a href="#about">Sitemap</a></li> -->
						<!-- Authentication Links -->
						@if (Auth::guest())
						<li><a id="login"
							@yield('activelogin') href="{{ route('login') }}">Login</a></li>
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
						<!-- <li><a id="profile" href="{{ url('/profile') }}"> {{ Auth::user()->firstname }}</a></li>-->
						<!-- </ul></li> -->
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
			<div style="padding-top: 43px;"/>
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
		<div class="footer">Copyright &#x24B8; 2017 - maintained by monastic members of Ramakrishna Math, Baghbazar</div>
		<!--</div>-->
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" async></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript" async/>-->
	<link href="{{ asset('css/rkm-udb.css') }}" rel="stylesheet">
	@yield('scripts')
</body>
</html>
