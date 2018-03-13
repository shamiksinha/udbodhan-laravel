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

		<h1>Subscribe</h1>
		
		{!! Form::open(['action' => 'BuyBookController@checkout']) !!}
			{!!Form::label('priceofbooks','Price of Books')!!}{{number_format($price,2)}}<br/>
			{!!Form::label('tax','Tax')!!}{{number_format($tax,2)}}<br/>
			{!!Form::label('total','Total')!!}{{number_format($total,2)}}<br/>
			{!!Form::label('buyer','Buyer Name')!!}{!!Form::text('buyer');!!}<br/>
			{!!Form::label('phone','Phone No.')!!}{!!Form::text('phone');!!}<br/>
			{!!Form::label('email','Email Id')!!}{!!Form::text('email');!!}<br/>
			<!-- {!!Form::hidden('priceofbooks',$price)!!}
			{!!Form::hidden('tax',$tax)!!} -->
			{!!Form::hidden('total',$total)!!}
			{!!Form::hidden('groupid',$groupid)!!}
			{!! Form::submit('Checkout') !!}
		{!! Form::close() !!}
		<h2>
		<font class="req">*</font>' Required Field
		</h2>
	</div>
</div>
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/buyBooks.js') }}"></script>
@endsection
