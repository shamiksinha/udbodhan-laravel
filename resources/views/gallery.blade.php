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
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="750" height="625" id="FlashID" title="Photo Gallery">
    <param name="movie" value="{{asset('js/photo-gallery-002.swf')}}" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="{{asset('js/expressInstall.swf')}}" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="{{asset('js/photo-gallery-002.swf')}}" width="750" height="625">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="{{asset('js/expressInstall.swf')}}" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>
</div>
</div>
@endsection
@section('scripts')
<!--<script src="{{ asset('js/udb_flashplayer.js') }}"></script>-->
<script src="{{ asset('js/udb_showpdf.js') }}"></script>
@endsection
