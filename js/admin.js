jQuery(function($){
	var itemList = $('#sortable');
    itemList.sortable({
        update: function(event, ui) {
            opts = {
                url: ajaxurl, // ajaxurl is defined by WordPress and points to /wp-admin/admin-ajax.php
                type: 'POST',
                async: true,
                cache: false,
                dataType: 'json',
                data:{
                    action: 'item_sort', // Tell WordPress how to handle this ajax request
                    order: itemList.sortable('toArray').toString() // Passes ID's of list items in  1,3,2 format
                },
                success: function(response) {
                    console.log(itemList.sortable('toArray').toString());
                    return; 
                },
                error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
                    alert(e);
                    // alert('There was an error saving the updates');
                    return; 
                }
            };
            $.ajax(opts);
        }
    });
}); // jQuery end