@extends('layouts.app-inner')
@section('activegallery')
class="active"
@endsection
@section('subtitle')
<div class="InsideSubTitle">100 years E-Book for You</div>
@endsection
@section('content')
<div id="white-boxInside">
	<div style="padding:20px;">
		<b> <font size="+2";>I</font>mage Gallery</b> 
		<div id="Display-box">
		
		</div>
	</div>
</div>
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<!-- <script src="{{ asset('js/udb_showpdf.js') }}"></script> -->
<script src="{{ asset('js/udb_showGallery.js') }}"></script>
@endsection
