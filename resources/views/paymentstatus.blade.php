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
		@if ($status)
			Payment has been received successfully.
		@else
			Payment has failed. Please retry after sometime.
		@endif
	</div>
</div>
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/buyBooks.js') }}"></script>
@endsection
