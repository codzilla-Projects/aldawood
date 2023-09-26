jQuery(document).ready(function($){
    var dt = $('#compTable').DataTable({    
        ajax: {
            url: "/wp-admin/admin-ajax.php?action=datatables_endpoint",
            cache:false,
        },
        columns: [
            { data: 'id' },
            { data: 'user_name' },
             { data: 'complaint' },
             { data: 'status' },
             { data: 'reply' },    
             { data: 'view' },    
             { data: 'add_reply' },    
        ],
        pageLength: 20
    }); //.DataTable()
}); 