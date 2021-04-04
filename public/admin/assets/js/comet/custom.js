(function($){
    $(document).on('click', '#logout_btn', function(e){
        e.preventDefault();
        $('#logout_form').submit();
    })

// category status
    $(document).on('click', 'input.cat_check', function(){
        let checked = $(this).attr('checked');
        let status_id = $(this).attr('status_id');

        if(checked == 'checked'){
           $.ajax({
            url: 'category/status-inactive/' + status_id,
            success: function(data){
                swal('Status inactivation successful');
            }
           });
        }else{
            $.ajax({
                url: 'category/status-active/' + status_id,
                success: function(data){
                    swal('Status activation successful');

                }
               });
        }
        
    }) 



    $('.delete-btn').click(function(){
        let conf = confirm('Are you sure?');
        if(conf==true){
            return true;
        }else{
            return false;
        }
    })

    // category edit

    $('.edit_cat').click(function(e){
        e.preventDefault();
        let id = $(this).attr('edit_id');
        $.ajax({
            url:'category/' + id + '/edit',
            success: function(data){
                $('#edit_category_modal form input[name="name"]').val(data.name);
                $('#edit_category_modal form input[name="edit_id"]').val(data.id);
                $('#edit_category_modal').modal('show');
            } 
        })

      
    })

    // Tag status

    $(document).on('click', 'input.tag_check', function(){
        let checked = $(this).attr('checked');
        let status_id = $(this).attr('status_id');

        if(checked == 'checked'){
           $.ajax({
            url: 'tag/status-inactive/' + status_id,
            success: function(data){
                swal('Status inactivation successful');
            }
           });
        }else{
            $.ajax({
                url: 'tag/status-active/' + status_id,
                success: function(data){
                    swal('Status activation successful');

                }
               });
        }
        
    }) 



})(jQuery)