@extends('layouts.app-inner')
@section('subtitle')
<div class="InsideSubTitle">Search 100 years e-Book</div>
@endsection
@section('activesearch')
class="active"
@endsection
@section('content')
<div id="search-boxwrap">
	<div style="padding:20px;">
		<div id="sectionSearch"> <span><b>To search the specific e-book Please insert <span class="req">Year</span>, <span class="req">Month</span> and <span class="req">Name</span> or any <span class="req">Author</span> you like. </b></span>
			<div  id="SearchPanel">
				<div id="search-layer">
					<form id="searchform" name="searchform" method="post" action="/search">
						{{ csrf_field() }}
						<span id="searchfield1"> <input type="text" name="Search"
							id="Search" value="@isset($query){{$query}}@endisset"/> <!-- <span class="textfieldRequiredMsg">Search</span> --></span>

						<div id="SearchButton" onclick="event.preventDefault();
												 document.getElementById('searchform').submit();"></div>
						<br /> <br /> <br />
					</form>
				</div>
			</div>
		</div>
		@if(isset($query))
		<div>
			<div style="padding-top:20px; padding-bottom:10px; height:auto"><b>Search result </b></div>
			<div id="SearchResult">
				<!-- <div id="boxinsd"> -->					
					<h2>
						The Search results for your query <b> {{ $query }} </b> are :
					</h2>
						@if(isset($results))
							@php ($facets=$results->getFacetSet()->getFacets()['bookname'])
							@foreach ($facets as $bookname=>$count)
								<a href="#" class="books" id="{{ $bookname }}">{{ $bookname }}</a>,				
							@endforeach
						@endif					
				<!-- </div> -->
			</div>
		</div>
		<div id="showpdf" style="display: none">
			<!--<a href="#" id="back">&ldsh; Go back</a>-->
			<div id="downloadLink" class="centerLayout"></div>
			<br />	
			<div id="Display-box">
			</div>	
		</div>
		@endif
	</div>
</div>
@endsection
@section('ad-space')
<div id="box"><b class="req">Search:</b> When you want to look for particular issues, all you need to do is type inside the search bar with the right words, Years and Issue. The search field has been designed to make it extremely easy for you to locate past issue, events, and authors including articles, even if they are a hundred years old.</div> 
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/udb_showpdf.js') }}"></script>
@endsection
