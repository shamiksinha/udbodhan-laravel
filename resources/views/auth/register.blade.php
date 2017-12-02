@extends('layouts.app-inner')
@section('activelogin')
class="active"
@endsection
@section('subtitle')
<div class="InsideSubTitle">100 years e-Book for You</div>
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
</style>
<div id="white-boxInside">
	<section>
	<div class="LogoInner"></div>
	<h1>Sign Up for Free</h1>
	<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <!-- <label for="firstname" class="col-md-4 control-label">First Name</label> -->

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder='First Name *' required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <!-- <label for="lastname" class="col-md-4 control-label">Last Name</label> -->

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder='Last Name *' required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder='Email Address *' required>

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
                                <input id="password" type="password" class="form-control" name="password" placeholder='Set Password *' required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> -->

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder='Confirm Password *' required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	</section>
</div>
<!-- </div> -->
@endsection
