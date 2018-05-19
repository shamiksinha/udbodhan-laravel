@extends('layouts.app-inner')
@section('activesubscribe')
class="active"
@endsection
@section('subtitle')
<div class="InsideSubTitle">Subscribe</div>
@endsection
@section('content')
<style>
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
		{!! Form::open(['action' => 'BuyBookController@buybooks']) !!}
			<div style="display: inline-table">
				<div>
					{!!Form::label('numofbooks','Number of Years to buy *',['style' => 'width: 300px;float: left;display: block;padding-right: 10px;padding-bottom: 10px;text-align: left;margin-top: 5px; margin-bottom: 5px'])!!}{!!Form::select('numofbooks',$udbBookGroup->pluck('num_of_books')->unique()->values()->all() , null, ['placeholder' => 'Pick the number of years to buy...','style' => 'width: 250px;margin-top: 5px; margin-bottom: 5px'])!!}
					
				</div>
				<div>
					{!!Form::label('bookstobuy','Books to buy *',['style' => 'width: 300px;float: left;display: block;padding-right: 10px;padding-bottom: 10px;text-align: left;margin-top: 5px; margin-bottom: 5px'])!!}{!!Form::select('bookstobuy',array('') , null, ['placeholder' => 'Pick the books to buy...','style' => 'width: 250px;margin-top: 5px; margin-bottom: 5px'])!!}
					
				</div>
			</div>
			<br/>
			<div id="displayerror" style="display: block;margin: auto">
					@if ($errors->has('numofbooks'))
						<span class="help-block">
							<strong>{{ $errors->get('numofbooks') }}</strong>
						</span>
					@endif
					<br/>
					@if ($errors->has('bookstobuy'))
						<span class="help-block">
							<strong>{{ $errors->get('bookstobuy') }}</strong>
						</span>
					@endif
			</div>
			<!--<div style="display: block">{!! Form::submit('Buy Books') !!}</div>
			<a id="buybooks" href="#"><div class="Downld-btn">BUY/DOWNLOAD BOOKS</div></a>-->
			<button type="submit" class="Downld-btn">BUY/DOWNLOAD BOOKS</button>
		{!! Form::close() !!}
		</div>
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
