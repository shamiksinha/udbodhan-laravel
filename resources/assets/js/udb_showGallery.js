/**
 * 
 */
import {embedSWF} from './udb_flashplayer';
$(document).ready(function(){
	console.log("Gallery OnLoad");
	$("#Display-box").html(embedSWF('js/photo-gallery-002','625','750'));
});

