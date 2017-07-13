@extends('layouts.app-inner')
@section('subtitle')
<div class="InsideSubTitle">Subscribe</div>
@endsection
@section('content')
<div id="subcrb-boxwrap">
	<div id="sectionSbcrb">
		<div class="LogoInner"></div>

		<h1>Subscribe</h1>
		<form>
			<!--Insert user data into this DIV area -->
			<div>USER DATA SHOULD BE HERE</div>
			<!--Insert user data into this DIV area -->
			<div> 
				<input class="flt-left" placeholder='Member code if any*' type='text'>
				<input class="flt-left" placeholder='Mobile (+Country code)' type='text'> 
			</div>
			<div> 
				<input class="flt-left" placeholder='State*' type='text'>
				<input class="flt-left" placeholder='Country*' type='text'> 
			</div>
			<input class="flt-big" placeholder='Mailing Address*' type='text'>
			<input class="flt-big" placeholder='Mailing Address 2' type='text'>
		</form>
		<button class="subscrb"><B>APPLY</B></button>
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
