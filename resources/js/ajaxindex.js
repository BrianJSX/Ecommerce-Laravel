//--------------Xóa tin tức----------------//
$('.Del-cart-btn').on('click',function(){
    if(confirm('bạn có muốn xóa không??')){
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'get',
            url :  url ,
            datatype: 'json',
            success: function(response){             
                window.location.reload();
                alert("xóa sản phẩm thành công");
            }
        });
    }
});

    

