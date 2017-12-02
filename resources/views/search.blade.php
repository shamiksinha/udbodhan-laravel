@extends('layouts.app-inner')
@section('subtitle')
<div class="InsideSubTitle">Search 100 years e-magazine</div>
@endsection
@section('activesearch')
class="active"
@endsection
@section('content')
<style>
#SearchPanel{
	clear:both;
	height: 80px;
	padding:10px;
	}
	
#search-layer{
	float:left;
	margin-top:20px;
	margin-left:185px;
	text-align:left;
	 width:auto; 
	 height: auto;
	
	}
#search-layerInsd{
	margin-top:5px;
	margin-left:5px;
	 width:350px; 
	 height: 10px;"
	
	}
	.js.webp .SearchImg{
		height:123px;
		width:128px;
		background:url(../images/book_RKM-hover.webp) no-repeat;
		}
		
	.no-js .SearchImg, .js.no-webp .SearchImg{
		height:123px;
		width:128px;
		background:url(../images/book_RKM-hover.png) no-repeat;
		}
		#Search, #dropDown{
	float:left;
	font-size:16px;
	color:#000;
	margin-top:2px;
	width:250px;
	height:32px;
	background-color: #FC0;
	border: 1px dotted black;
    opacity: 0.7;
	padding:5px 5px 5px 5px;
	border-radius: 4px;
    
	}
#dropDown{
	float:left;
	background-color: transparent;
	border: 0px dotted black;
	padding-left:5px;
	padding-right:0px;
	padding-top:0px;
	padding-bottom:0px;
	width:auto;
    
	}
.js.webp #SearchButton{
	float:left;
	background:url(../images/RKM-search-icon.webp) no-repeat;
	width:30px;
	height:32px;
	background-color:#000;
	margin-top:2px;
	margin-left:5px;
    border-radius: 4px;
	cursor:pointer;
	
	}
	
	.no-js #SearchButton, .js.no-webp #SearchButton{
	float:left;
	background:url(../images/RKM-search-icon.png) no-repeat;
	width:30px;
	height:32px;
	background-color:#000;
	margin-top:2px;
	margin-left:5px;
    border-radius: 4px;
	cursor:pointer;
	
	}
	
	#sectionSbcrb, #sectionSearch, #SearchResult {
  width: 600px;
    background: #CAB28B;
  padding: 0px 30px 30px 30px;
  margin: 60px auto;
  text-align: center;
  border-radius: 5px;
box-shadow: 2px 2px 5px rgba(0,0,0,.3);
}

#sectionSearch, #SearchResult
 {
  margin: 30px auto;
  padding-top:20px;
  width: 800px;
}

#SearchResult{
	margin-top:0px;
  background-color: #DFD6AA;
  /*opacity: 0.6;*/
  height:auto;
    border-radius: 6px;
  border: 1px dotted black;
  box-shadow:none;
	}
	
#SearchResult table{border-spacing:0 10px}
</style>
<div id="white-boxInside">
	<div style="padding:20px;">
		<div id="sectionSearch"> <span><b>To search the specific e-magazine Please insert <span class="req">Year</span>, <span class="req">Month</span> and <span class="req">Name</span> or any <span class="req">Author</span> you like. </b></span>
			<div  id="SearchPanel">
				<div id="search-layer">
					<form id="searchform" name="searchform" method="post" action="/search">
						{{ csrf_field() }}
						<span id="searchfield1" style="width:100px;"> <input type="text" name="Search"
							id="Search" value="@isset($query){{$query}}@endisset"/> <!-- <span class="textfieldRequiredMsg">Search</span> -->
							<!-- <input type="checkbox" name="searchBy" value="Search By Author" checked="checked">Search By Author</input>
							<input type="checkbox" name="searchBy" value="Search By Subject" checked="checked">Search By Subject</input> -->
							{{Form::checkbox('searchBy[]', 'searchAuthor', true, ['label'=>'Search By Author'])}}{{Form::label('searchAuthor', 'Search By Author')}}
							{{Form::checkbox('searchBy[]', 'searchSubject', true, ['label'=>'Search By Subject'])}}{{Form::label('searchSubject', 'Search By Subject')}}
						</span>

						<div id="dropDown">
							<select id="month" name="month[]" multiple style="background-color: #FC0;border: 1px dotted black;border-radius: 4px;color:#000;" >
								<option @isset($months) @if(in_array('baishakh',$months)) selected @endif @endisset value="baishakh">Baishakh</option>
								<option @isset($months) @if(in_array('jaistha',$months)) selected @endif @endisset value="jaistha">Jaistha</option>
								<option @isset($months) @if(in_array('ashar',$months)) selected @endif @endisset value="ashar">Ashar</option>
								<option @isset($months) @if(in_array('srabon',$months)) selected @endif @endisset value="srabon">Srabon</option>
								<option @isset($months) @if(in_array('vadro',$months)) selected @endif @endisset value="vadro">Vadro</option>
								<option @isset($months) @if(in_array('ashyeen',$months)) selected @endif @endisset value="ashyeen">Ashyeen</option>
								<option @isset($months) @if(in_array('karttik',$months)) selected @endif @endisset value="karttik">Karttik</option>
								<option @isset($months) @if(in_array('agrohawan',$months)) selected @endif @endisset value="agrohawan">Agrohawan</option>
								<option @isset($months) @if(in_array('poush',$months)) selected @endif @endisset value="poush">Poush</option>
								<option @isset($months) @if(in_array('magh',$months)) selected @endif @endisset value="magh">Magh</option>
								<option @isset($months) @if(in_array('falgoon',$months)) selected @endif @endisset value="falgoon">Falgoon</option>
								<option @isset($months) @if(in_array('chaitra',$months)) selected @endif @endisset value="chaitra">Chaitra</option>
							</select>
						</div>
						
						<div id="SearchButton" onclick="event.preventDefault();
							var searchBy=document.getElementsByName('searchBy[]');
							var i=0;
							var selectedSearchFilter=false;
							for (i = 0; i<searchBy.length; i++){
								if (searchBy[i].type=='checkbox' && searchBy[i].checked==true){
									selectedSearchFilter=true;
									break;
								}
							}
							if (selectedSearchFilter){
								document.getElementById('searchform').submit();
							}
							else{
								alert('Please select a search filter to search');
							}"></div>
						<br /> <br /> <br />
					</form>
				</div>
			</div>
		</div>
		@if(isset($query) or isset($months))
		<div>
			<div style="padding-top:20px; padding-bottom:10px; height:auto"><b>Search result </b></div>
			<div id="SearchResult">
				<!-- <div id="boxinsd"> -->					
					<h2>
						The Search results @if(isset($query)) for your query <b> {{ $query }} </b> @endif @if(isset($months)) for the months of <b> @foreach ($months as $index=>$month) {{$month }} @if (count($months)>($index+1)) , @endif @endforeach </b> @endif are :
					</h2>
						{{$paginator ->appends([
							'Search'=>Input::get('Search'),
							'month'=>Input::get('month'),
							'searchBy'=>Input::get('searchBy')
						])->links()}}
						@foreach($results as $bookName=>$bookDetails)
							@php
								$count=count($bookDetails['author'])
							@endphp
							<a href="/showSelectedPdf/{{$bookName}}" class="book" id="{{$bookName}}">{{$bookName}}</a> has {{$count}} records<br>
							<div align="center">
								<table>
									<tr><th>AUTHOR</th><th>SUBJECT</th></tr>
									@for ($i=0;$i<$count;$i++)
										<tr><td>{{$bookDetails['author'][$i]}}</td><td>{{$bookDetails['subject'][$i]}}</td></tr>
									@endfor
								</table>
							</div>
							@if (!$loop->last)
								<hr/>
							@endif
						@endforeach
						{{$paginator->links('pagination.default', ['paginator' => $paginator])}}					
				<!-- </div> -->
			</div>
		</div>		
		<div id="showpdf" style="display: none">
			<div><b style="font-size:16px"></b></div>
			<a href="#" id="back">&ldsh; Go back</a>
			<div id="downloadLink" class="centerLayout"></div>
			<br />	
			<div id="Display-box" style="margin-top:10px">
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
