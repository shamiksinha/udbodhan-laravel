@extends('layouts.app-inner')
@section('activesubscribe')
class="active"
@endsection
@section('subtitle')
<div class="InsideSubTitle">Subscribe</div>
@endsection
@section('content')
<style>
div#checkoutbooks>div>label {
	width: 200px;
	float: left;
	display: block;
	padding-right: 10px;
	padding-bottom: 10px;
	text-align: left
}

div#checkoutbooks>div>input {
	width: 200px;
	float: left;
	display: block;
	margin-bottom: 10px;
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
.Downld-btn {
  float: right;
  width:150px;
  height: 40px;
  margin:10px 10px 10px 10px;
  padding:5px;
  font-weight:bold;
  cursor: pointer;
}
button:focus {
  outline: none;
}

button:hover {
  background: #666;
}
</style>
<div id="subcrb-boxwrap">
	<div id="sectionSbcrb">
		<div class="LogoInner"></div>

		<h1>Subscribe</h1>
		<div style="width: 700px;margin: auto">
			{!! Form::open(['action' => 'BuyBookController@checkout']) !!}
				<div id="checkoutbooks" style="display: inline-table">
					<div>{!!Form::label('priceofbooks','Price of Books')!!}<label>{{number_format($price,2)}}</label></div>
					<div>{!!Form::label('tax','Tax')!!}<label>{{number_format($tax,2)}}</label></div>
					<div>{!!Form::label('total','Total')!!}<label>{{number_format($total,2)}}</label></div>
					<div>{!!Form::label('buyer','Buyer Name *')!!}{!!Form::text('buyer',Auth::user()->firstname.' '.Auth::user()->lastname,['required','autofocus']);!!}</div>
					<div>{!!Form::label('phone','Phone No. *')!!}{!!Form::text('phone',null,['required']);!!}</div>
					<div>{!!Form::label('email','Email Id *')!!}{!!Form::email('email',Auth::user()->email,['required']);!!}</div>
					{!!Form::hidden('total',$total)!!}
					{!!Form::hidden('groupid',$groupid)!!}
					{!!Form::hidden('bookid',$bookid)!!}					
				</div>
				<!--<div style="display:block;margin: auto">{!! Form::submit('Checkout') !!}</div>	
				<a id="checkout" href="#" style="display:block"><div class="Downld-btn">CHECKOUT</div></a>-->
				<div style="display:block"><button type="submit" class="Downld-btn">CHECKOUT</button></div>
			{!! Form::close() !!}
			<h2>
				<font class="req">*</font>' Required Field
			</h2>
		</div>		
	</div>
</div>
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/buyBooks.js') }}"></script>
@endsection
