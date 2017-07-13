@extends('layouts.app-inner')
@section('subtitle')
<div class="InsideSubTitle">Search 100 years e-Book</div>
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
							id="Search" /> <!-- <span class="textfieldRequiredMsg">Search</span> --></span>

						<div id="SearchButton" onclick="event.preventDefault();
												 document.getElementById('searchform').submit();"></div>
						<br /> <br /> <br />
					</form>
				</div>
			</div>
		</div>
		<div>
			<div style="padding-top:20px; padding-bottom:10px; height:auto"><b>Search result </b></div>
			<div id="searchResult">
				<div id="boxinsd">
					@if(isset($query))
					<h2>
						The Search results for your query <b> {{ $query }} </b> are :
					</h2>
						@if(isset($results))
							@php ($facets=$results->getFacetSet()->getFacets()['bookname'])
							@foreach ($facets as $bookname=>$count)
								<a href="#" class="books" id="{{ $bookname }}">{{ $bookname }}</a>,				
							@endforeach
						@endif
					@endif
				</div>
			</div>
		</div>
		<div id="showpdf" style="display: none">
			<!--<a href="#" id="back">&ldsh; Go back</a>-->
			<div id="downloadLink" class="centerLayout"></div>
			<br />	
			<div id="Display-box">
			</div>	
		</div>
	</div>
</div>
@endsection
@section('ad-space')
This Search-engine has been provided for the user to make thier search easier as well as user friendly. Request you read the instruction before serch any ebook. To search the specific e-book Please insert Year, Month and Name or any relavant Author you likeK. This search engine developed based on the requirement of image search, We supposed to inform to the user that this book has been made bay image scanned files. so it is our challenge to provide excellent SEARCH solution from this search engine. 
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/udb_showpdf.js') }}"></script>
@endsection
