(function($){

    $(document).ready(function(){

    // load CK editor

    CKEDITOR.replace('post_editor');

    $('.post_tag_select').select2();

        
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

// Tag edit

$('.edit_tag').click(function(e){
    e.preventDefault();
    let id = $(this).attr('edit_id');
    $.ajax({
        url:'tag/' + id + '/edit',
        success: function(data){
            $('#edit_tag_modal form input[name="name"]').val(data.name);
            $('#edit_tag_modal form input[name="edit_id"]').val(data.id);
            $('#edit_tag_modal').modal('show');
        } 
    })

  
})

    //Post Image load
    $('#post_img_select').change(function(e){
        let img_url = URL.createObjectURL(e.target.files[0]);
        $('.post_img_load').attr('src', img_url);
    });

    // gallery image load

    $('#post_img_select_g').change(function(e){
       let img_gall = '';
       for(i=0; i<e.target.files.length; i++){
           let file_url = URL.createObjectURL(e.target.files[i]);
           img_gall +='<img class="shadow" src=" '+ file_url +'">';
       }
       $('.post-gallery-img').html(img_gall);
    });

        // Seleect post format
    $('#post_format').change(function(){

       let format = $(this).val();
       // alert(format);

        if(format == 'Image'){
            $('.post-image').show();
        }else{
            $('.post-image').hide();
        }
        if(format == 'Gallery'){
            $('.post-gallery').show();
        }else{
            $('.post-gallery').hide();
        }
        if(format == 'Video'){
            $('.post-video').show();
        }else{
            $('.post-video').hide();
        }
        if(format == 'Audio'){
            $('.post-audio').show();
        }else{
            $('.post-audio').hide();
        }
       
    })


    })



})(jQuery)