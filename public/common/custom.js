$('.confirm').click(function () {
        return confirm('هل أنت متأكد؟');
    });

    var base_url = $('#base_url').val();

    $('.favourite_add').click(function() {
        var token = $(this).data('token');
        var id = $(this).attr('product');
        $.ajax({
            url: base_url + '/wishlist_add',
            type: 'post',
            data: '_token=' + token + '&productID=' + id,
            dataType: 'json',
            success:function() {
                var wishCount = document.getElementById('wishesCount').value;
                wishCount++;
                document.getElementById('wishesCount').value = wishCount;
            },
            error: function() {
                var wishCount = document.getElementById('wishesCount').value;
                wishCount--;
                document.getElementById('wishesCount').value = wishCount;
            }
        });
    });
    $('.favourite_add').click(function() {
        $(this).toggleClass('color55');
    });

    $('.marked_as_read').click(function() {
        var token = $(this).data('token');
        var id = $(this).attr('notification');
        $.ajax({
            url: base_url + '/read',
            type: 'post',
            data: '_token=' + token + '&notificationID=' + id,
            dataType: 'json',
        });
    });

    $('.sub').click(function() {
        var token = $(this).data('token');
        var email = document.getElementById("sub_email").value;
        $.ajax({
            url: base_url + '/subscribe',
            type: 'post',
            data: '_token=' + token + '&email=' + email,
            dataType: 'json',
            success:function(){
                alert('تم الاشتراك في القائمة البريدية');
            },
        });
    });

    $('.flag-comment').click(function() {
        var token = $(this).data('token');
        var comment_id = $(this).attr('comment');
        var comment_owner = $(this).attr('comment_owner');
        var why = $(this).attr('why');
        $.ajax({
            url: base_url + '/flag/comment',
            type: 'post',
            data: '_token=' + token + '&commentID=' + comment_id + '&comment_owner=' + comment_owner + '&why=' + why,
            dataType: 'json',
            success:function() {
                $('#flag-alert-success').addClass('in');
                $('#flag-alert-success').removeClass('out');
            },
            error: function() {
                $('#flag-alert-error').addClass('in');
                $('#flag-alert-error').removeClass('out');
            }
        });
    });

    $('.flag-ad').click(function() {
        var token = $(this).data('token');
        var ad_id = $(this).attr('ad_id');
        var ad_owner = $(this).attr('ad_owner');
        $.ajax({
            url: base_url + '/flag/ad',
            type: 'post',
            data: '_token=' + token + '&ad_id=' + ad_id + '&ad_owner=' + ad_owner,
            dataType: 'json',
            success:function() {
                $('#flag-alert-success').addClass('in');
                $('#flag-alert-success').removeClass('out');
            },
            error: function() {
                $('#flag-alert-error').addClass('in');
                $('#flag-alert-error').removeClass('out');
            }
        });
    });
    
    $('#category_id').on('change',function(e){
        console.log(e);
        var category_id = e.target.value;
        $.get( base_url + '/ajax-subcats?category_id='+ category_id,function(data){
            $('#subcategory_id').empty();
              $('#subcategory_id').append('<option value="">-- غير محدد --</option>');
            $.each(data,function(index, subcatObj){
               
                $('#subcategory_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
            });
        });
    });
    
    $('#subcategory_id').on('change',function(e){
        console.log(e);
        var subcategory_id = e.target.value;
        $.get( base_url + '/ajax-subsubcats?subcategory_id='+ subcategory_id,function(data){
            $('#subsubcategory_id').empty();
            $.each(data,function(index, subcatObj){
                $('#subsubcategory_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
            });
        });
    });
    
    $('#country_id').on('change',function(e){
        console.log(e);
        var country_id = e.target.value;
        $.get( base_url + '/ajax-cities?country_id='+ country_id,function(data){
            $('#city_id').empty();
            $.each(data,function(index, subcatObj){
                $('#city_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
            });
        });
    });