/**
 * 
 */
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
});

$("select#numofbooks").click(function(){
	
	var selectedOption=$("select#numofbooks option:selected").text();
	var selectedValue=$("select#numofbooks").val();
	console.log("Selected value"+selectedOption);
	console.log("Selected value"+selectedValue);
	if (selectedValue!=""){
		var _select=$('<select>');
		var selectYear=$("select#bookstobuy");
		$.ajax({
            type:'POST',
            url:'/getBookData',
            data:{selectedData:selectedOption},
            success:function(data){
               console.log(data);
               console.log(data[0]);
               $.each(data, function(key,val){
            	   console.log(key);
            	   console.log(val['start_book']['book_year']);
            	   console.log(val['start_book']['book_month']);
            	   console.log(val['end_book']['book_year']);
            	   console.log(val['end_book']['book_month']);
            	   var startBook=val['start_book'];
            	   var startBookYear=startBook['book_year'];
            	   var startBookMonth=startBook['book_month'];
            	   var endBook=val['end_book'];
            	   var endBookYear=endBook['book_year'];
            	   var endBookMonth=endBook['book_month'];
            	   var groupId=val['group_id'];
            	   var option=new Option(startBookYear+"-"+startBookMonth+" to "+endBookYear+"-"+endBookMonth,groupId);
            	   _select.append(option);            	   
               });
               console.log("select html"+_select.html());
               selectYear.find('option:not(:first)').remove();
       		   selectYear.append(_select.html());
       		   selectYear.find('option:first').attr("selected","selected");
            }
         });		
	}
});