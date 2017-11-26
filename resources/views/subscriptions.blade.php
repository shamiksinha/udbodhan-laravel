@extends('layouts.app-inner')
@section('activesubscribe')
class="active"
@endsection
@section('subtitle')
<div class="InsideSubTitle">Subscribe</div>
@endsection
@section('content')
<div id="subcrb-boxwrap">
	<div id="sectionSbcrb">
		<div class="LogoInner"></div>

		<h1>Subscriptions</h1>
		<!--Insert user data into this DIV area -->
		<div>USER DATA SHOULD BE HERE</div>
				
		<form id="subscribeform" name="subscribeform" method="post" action="/subscribe">
			
			@foreach($subscriptions as $subscription)
			<div style="text-align:left">
			<input type="radio" name="subcription" style="height: 20px;width:10px;padding:0px;" value="{{$subscription->udb_subcription_id}}"><label for="{{$subscription->udb_subcription_id}}">{{$subscription->udb_subcription_desc}}</label><br>
			</div>
			@endforeach
			
			
			<!--Insert user data into this DIV area -->
			<div> 
				<input name="membercode" id="membercode"  class="flt-left" placeholder='Member code if any*' type='text'>
				<input name="mobile" id="mobile" class="flt-left" placeholder='Mobile (+Country code)' type='text'> 
			</div>
			<div> 
				<input name="state" id="state" class="flt-left" placeholder='State*' type='text'>
				<input name="country" id="country" class="flt-left" placeholder='Country*' type='text'> 
			</div>
			<input name="mailingaddr1" id="mailingaddr1" class="flt-big" placeholder='Mailing Address*' type='text'>
			<input name="mailingaddr2" id="mailingaddr2" class="flt-big" placeholder='Mailing Address 2' type='text'>
		
			<button class="subscrb" onclick="event.preventDefault();
												 document.getElementById('subscribeform').submit();"><B>APPLY</B></button>
		</form>
		<h2>
		<font class="req">*</font>' Required Field
		</h2>
	</div>
</div>
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/udb_showpdf.js') }}"></script>
@endsection
