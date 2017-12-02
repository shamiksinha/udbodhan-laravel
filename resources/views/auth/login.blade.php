@extends('layouts.app-inner')
@section('activelogin')
class="active"
@endsection
@section('content')
<style>
.js.webp .LogoInner {
  display: block;
  position: relative;
  margin: 0 auto;
  top: -40px;
  height: 80px;
  width: 80px;
  background:url(../images/RKM-logo-002.webp) center center no-repeat, #f39c12;
  border-radius: 50%;
box-shadow: 1px 1px 2px rgba(0,0,0,.3);

}

.no-js .LogoInner, .js.no-webp .LogoInner {
  display: block;
  position: relative;
  margin: 0 auto;
  top: -40px;
  height: 80px;
  width: 80px;
  background:url(../images/RKM-logo-002.png) center center no-repeat, #f39c12;
  border-radius: 50%;
box-shadow: 1px 1px 2px rgba(0,0,0,.3);

}

button, .subscrb, .Downld-btn {
  width: 100%;
  height: 30px;
  border: none;
 background: #d35400;
  color: #ecf0f1;
  font-weight: 100;
  margin-bottom: 15px;
  border-radius: 5px;
  transition: all ease-in-out .2s;
  border-bottom: 3px solid #666;
}

button:focus {
  outline: none;
}

button:hover {
  background: #666;
}

.col-md-6 .col-md-8{
	padding-top: 50px;
}
</style>
<!-- <div class="container">-->
<div id="white-boxInside">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!--<div class="panel-heading">Login</div>-->
				<section>
					<div class="LogoInner"></div>
					<h1>User Login</h1>
					<div class="panel-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

								<div class="col-md-6">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder='E-Mail Address' required autofocus>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<!-- <label for="password" class="col-md-4 control-label">Password</label> -->

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password" placeholder='Password' required>

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<!--<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
										</label>
									</div>
								</div>
							</div>-->

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Login
									</button>

									<!--<a class="btn btn-link" href="{{ route('password.request') }}">
										Forgot Your Password?
									</a>
									<a class="btn btn-link" href="{{ route('register') }}">
										Sign up for free
									</a>-->
									<h2><a href='{{ route('register') }}'>* Sign up</a>  |   <a href='{{ route('password.request') }}'>Forgot Password?</a></h2>								</div>
							</div>
						</form>
					</div>
				</section>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
@endsection
