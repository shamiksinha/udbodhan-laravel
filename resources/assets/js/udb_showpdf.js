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
	 	$("#searchResult").css('display','none');
		$("#box").css(float);

	 	var bookname=id.split('.')[0];
	 	var downloadDiv = $('#downloadLink');
	    downloadDiv.append($('<a>').attr('href', 'pdf/'+id).attr('download', 'pdf/'+id).text('Download'));
	    $("#white-box").html(embedSWF('swf/'+bookname));
	 });
 $("#back").click(function(){
	event.preventDefault();
	$("#showpdf").css('display','none');
 	$("#searchResult").css('display','inline-block');
	});