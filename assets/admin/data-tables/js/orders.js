jQuery(document).ready(function($){
    var dt = $('#ordersTable').DataTable({    
        ajax: {
            url: "/wp-admin/admin-ajax.php?action=datatables_orders_endpoint",
            cache:false,
        },
        columns: [
            { data: 'id' },
            { data: 'user_name' },
             { data: 'total' },
             { data: 'order_status' },
             { data: 'address' },    
             { data: 'phone' },    
             { data: 'created_at' },    
             { data: 'view' },    
        ],
        pageLength: 20
    }); //.DataTable()
}); 