@extends('layouts.app')
@section('content')
<div id="searchResult">
	@if(isset($query))
	<h2>
		The Search results for your query <b> {{ $query }} </b> are :
	</h2>
		@if(isset($results))
			@php ($facets=$results->getFacetSet()->getFacets()['bookname'])
			@foreach ($facets as $bookname=>$count)
				<h3> <a href="#" class="books" id="{{ $bookname }}">{{ $bookname }}</a></h3>
				<br /> 
			@endforeach
		@endif
	@endif
</div>
<div id="showpdf" style="display: none">
	<a href="#" id="back">&ldsh; Go back</a>
	<div id="downloadLink" class="centerLayout"></div>
	<br />	
	<div id="white-box">
	</div>	
</div>

@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/udb_showpdf.js') }}"></script>
@endsection
