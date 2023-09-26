jQuery(document).ready(function($){
    var dt = $('#reviewsTable').DataTable({    
        ajax: {
            url: "/wp-admin/admin-ajax.php?action=datatables_reviews_endpoint",
            cache:false,
        },
        columns: [
            { data: 'id' },
            { data: 'user_name' },
             { data: 'order_id' },
             { data: 'review' },
             { data: 'stars' },    
             { data: 'created_at' },    
        ],
        pageLength: 20
    }); //.DataTable()
}); 