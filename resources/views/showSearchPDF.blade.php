@extends('layouts.app-inner')
@section('subtitle')
<div class="InsideSubTitle">Read e-Book</div>
@endsection
@section('activesearch') class="active" @endsection
@section('content')
	<style>
	#SubTitleDiv {
	float:left;
	width:auto;
	text-align:left;
	font-stretch: wider;
	font-size:12px;
	text-indent: 10px;
	margin-top:10px;
	font-weight:bold;
	}
	.js.webp #Flash-Btn{
	  width:40px;
	  height:40px;
	  background:url(../images/Flash-Player-Icon.webp) no-repeat;
	  float:right;
	  margin:10px 10px 10px 10px;
	  cursor:se-resize;
	  }
	  .no-js #Flash-Btn, .js.no-webp #Flash-Btn{
	  width:40px;
	  height:40px;
	  background:url(../images/Flash-Player-Icon.png) no-repeat;
	  float:right;
	  margin:10px 10px 10px 10px;
	  cursor:se-resize;
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
  float:right;
  width:100px;
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
#Display-box
{

  width:100%px;
  height: auto;
  background-color: #E2E2E2;
  border-radius: 6px;
  border: 1px dotted black;
  /*opacity: 0.5;*/
  padding:30px;
  margin-top:90px;
  font-size:12px;
  text-align:center;

}
	</style>
	<div id="white-boxInside">
		<div style="padding: 20px;">
			<div id="SubTitleDiv">Enjoy ebook</div>
			<span id="Flash-Btn"></span>
			<a href="/download/{{$bookName}}"><div class="Downld-btn">DOWNLOAD PDF</div></a>
			<div id="Display-box">				
				<object data="{{url('swf/'.explode('.', $bookName)[0].'.swf')}}" height="1198px" width="100%"/>
			</div>
		</div>
	</div>
	@endsection 
	@section('ad-space')
	<div id="box">
		<b class="req"> Display</b> <br /> This is a unique section of our
		website and a lot of work has gone into the creation of this
		presentation, feature wise. The ebook enables you to look closely at
		some of the marvelously written issues that have made the Udbodhan
		Patrika such a rage through more than a hundred years of its journey.
		<br /> User would be able to read and download their required pages
		from this display page. It is requested to get free download FLASH
		PLAYER by clicking the the button on Top Right corner of the display
		area. User will be able to download the PDF fron by pressing the
		"DOWBLOAD PDF" button. before you download you will have to subscribe
		the opportunities from top navigation menu. <br />
	</div>
	@endsection 
	@section('scripts')
	<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
	<script src="{{ asset('js/udb_showpdf.js') }}"></script>
	@endsection