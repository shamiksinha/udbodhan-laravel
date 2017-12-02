/**
 * 
 */
import {embedSWF} from './udb_flashplayer';
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
});
$(".books").click(function(){	 	
	 	event.preventDefault();
	 	var id=event.target.id;
	 	console.log(id);
	 	//$("#swfdoc").html('<p>'+id+'</p>');
	 	//$("#showpdf").append('<p>'+id+'</p>');
	 	$("#showpdf").css('display','inline-block');
	 	$("#SearchResult").css('display','none');
		$("#box").css('float');

	 	var bookname=id.split('.')[0];
	 	var downloadDiv = $('#downloadLink');
	    downloadDiv.html($('<a>').attr('href', 'pdf/'+id).attr('download', 'pdf/'+id).text('Download'));
	    $("#Display-box").html(embedSWF('swf/'+bookname,'1188','972'));
});
$("#back").click(function(){
	event.preventDefault();
	$("#showpdf").css('display','none');
 	$("#SearchResult").css('display','inline-block');
});
$("#Search").keypress(function(event){
	var keyascii=event.which;
	if ( keyascii<32){
		event.preventDefault();
	} else if (keyascii>32 && keyascii<42 ){
		event.preventDefault();
	} else if ( keyascii>42 && keyascii<48 ){
		event.preventDefault();
	} else if(keyascii>57 && keyascii<65){
		event.preventDefault();
	} else if(keyascii>90 && keyascii<97){
		event.preventDefault();
	} else if(keyascii>122){
		event.preventDefault();
	}
});