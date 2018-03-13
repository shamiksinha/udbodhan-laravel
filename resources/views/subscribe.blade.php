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
		<!--  <form id="subscribeform" name="subscribeform" method="post" action="/subscribe">
			<!- -Insert user data into this DIV area - ->
			<div>USER DATA SHOULD BE HERE</div>
			<!- -Insert user data into this DIV area - ->
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
		</form>-->
		{!! Form::open(['action' => 'BuyBookController@buybooks']) !!}
			<!--@foreach($udbBookGroup as $key=>$bookGroupDetail)
				  <div>
					{!!Form::checkbox('bookGroup', $key)!!}{!!Form::label('bookGroup',$bookGroupDetail['start_book']['desc'].' to '.$bookGroupDetail['end_book']['desc'].' having '.$bookGroupDetail['num_of_books'].' book(s)')!!}{!! Form::hidden('hidden'.$key,$bookGroupDetail['start_book']['book_id'].','.$bookGroupDetail['end_book']['book_id'])!!}
				</div>
				
			@endforeach-->
			<div>
				{!!Form::label('numofbooks','Number of Books to buy')!!}{!!Form::select('numofbooks',$udbBookGroup->pluck('num_of_books')->unique()->values()->all() , null, ['placeholder' => 'Pick the number of books to buy...'])!!}
			</div>
			<div>
				{!!Form::label('bookstobuy','Books to buy')!!}{!!Form::select('bookstobuy',array('') , null, ['placeholder' => 'Pick the group to buy...'])!!}
			</div>
			{!! Form::submit('Buy Books') !!}
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
