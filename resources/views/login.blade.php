@extends('layouts.app-inner')
@section('activelogin')
class="active"
@endsection
@section('content')
<style>
.col-md-6 {
	padding-bottom: 5px;
	padding-top: 5px;
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
									<h2><a href="{{ route('register') }}">* Sign up</a>  |   <a href="{{ route('password.request') }}">Forgot Password?</a></h2>								</div>
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
