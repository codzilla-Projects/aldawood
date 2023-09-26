
(function ($) {
      
    $(document).ready(function(){
       $('#compTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':my_ajax_object.ajax_url + 'ajax_functions.php'
          },
          'columns': [
             { data: 'id' },
             { data: 'complaint' },
             { data: 'status' },
             { data: 'reply' },
          ]
       });
    });
    
/*
$( document ).ready(function() {
	var table = $('#compTable').dataTable({			
			 "bProcessing": true,
			 "sAjaxSource": {
                  'url':my_ajax_object.ajax_url + 'pagination_data.php'
              },
			 "bPaginate":true,
			 "sPaginationType":"full_numbers",
			 "iDisplayLength": 5,
			 "bLengthChange":false,	
			 "bFilter": false,			 
			 "aoColumns": [
					{ mData: 'id' } ,
					{ mData: 'complaint' },
					{ mData: 'status' },
					{ mData: 'reply' }
			]
	});   
});
*/

})(jQuery);