@extends('layouts.app-inner')
@section('activeviews')
class="active"
@endsection
@section('subtitle')
<div class="InsideSubTitle">Views</div>
@endsection
@section('content')
<div id="Views-BG">
	<div style="padding: 20px;">
		<span><!-- <img src="images/editor-002.webp" width="300" height="231"
			alt="" /> -->
			<picture>
						<source srcset="{{asset('images/editor-002.webp')}}" type="image/webp" width="300" height="231" alt="">
						<source srcset="{{asset('images/editor-002.png')}}" type="image/png" width="300" height="231" alt="">
						<img src="{{asset('images/editor-002.png')}}" width="300" height="231" alt=""/>
			</picture>
		</span>
		<div id="Display-box">
			<div id="box">
				<span>The Ramakrishna Math & Mission is undoubtedly the brightest of
					stars in the firmament of India as a Socio-Religious organization
					par excellence. It was the great Indian spiritual leader Sri
					Ramakrishna and later his famed disciple Swami Vivekananda that
					brought a sea change in the horizon of Bengal. It was the singular
					vision of RKM to ensure the brightness of their knowledge shine
					upon the rest of the country to become a driving force that sets
					Hinduism apart. It was the teachings of the Guru Sri Ramakrishna
					and the message spread by Sri Vivekananda that percolated the
					fragrance of Indian thought across the globe.One of the efforts of
					Swami Vivekananda was the "Udbodhan Patrika" that became a catalyst
					to spread a new vision of India. Till the present times it is this
					Patrika that has sparkled with the brilliance of a thousand stars
					to spread a unique vision of the times in Bengal. The word Udbodhan
					in Bengali means "Opening" and this fabled magazine has been aptly
					named so. It has acted as the instrument that has opened the heart
					and minds of not just the people of Bengal but people all over the
					world. Not just this but the entire publishing effort initiated
					then has come a long way in propagating myriad thoughts to people
					all over.</span>
			</div>
		</div>
	</div>
</div>
@endsection
@section('ad-space')
<div id="box">
	<b class="req">Views:</b> This is another very important section of the
	site, where views and thoughts of senior members of the Ramakrishna
	Mission and Math. These are views by people that have made this
	organization dear to the hearts of Indians all over. It is members of
	this mission that have stood by common people be it during the war,
	famine, floods or any natural calamities. They are the people who have
	actually believed that service to humankind is the greatest of worship.
	Within the pages of the Udbodhan Patrika one can find these amazing
	stories of many of these incidents with rare photographs of the wonder
	people who have made all this possible through their selfless devotion.
</div>
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<!-- <script src="{{ asset('js/udb_showpdf.js') }}"></script> -->
@endsection
