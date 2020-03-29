

$(document).ready(function(){
   
    //-----------------Hiển thị tất cả thông tin danh mục ------------------//
    $('.btn-info-category').on('click',function(){
         var url = $(this).attr('data-url');
        $.ajax({
            type: 'get',
            url :  url ,
            datatype: 'json',
            success: function(response){             
                $('textarea.category_desc').val(response.data.category_desc);
              },
        });
    });
    //-----------------Xóa danh mục------------------//
    $('.btn-destroy-category').on('click',function(){
        if(confirm('bạn có muốn xóa không??')){
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'get',
                url : url,
                success: function(){   
                      window.location.reload();
                      alert("xóa danh mục thành công");
                },
            });
        }
    });
    //-----------------Hiển thị thông tin thương hiệu------------------//

    $('.btn-info-brand').on('click',function(){
        var url = $(this).attr('data-url');
       $.ajax({
           type: 'get',
           url :  url ,
           datatype: 'json',
           success: function(response){             
               $('textarea.form-control.brand_desc').val(response.data.brand_desc);
             },
       });
    });
    
    //-----------------Xóa Thương Hiệu------------------//
       $('.btn-destroy-brand').on('click',function(){
        //    alert('ok');
        if(confirm('bạn có muốn xóa không??')){
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'get',
                url : url,
                success: function(){   
                      window.location.reload();
                      alert("xóa thương hiệu thành công");
                },
            });
            }
        });
    //--------------Hiển thị info sản phẩm----------------//
    $('.btn-info-product').on('click',function(){
        var url = $(this).attr('data-url');
        // console.log(url);
        $.ajax({
            type: 'get',
            url :  url ,
            datatype: 'json',
            success: function(response){             
                $('#accessoriesshow').val(response.data.prod_accessories);
                $('#wanrrantyshow').val(response.data.prod_warranty);
                $('#promotionshow').val(response.data.prod_promotion);
                $('#conditionshow').val(response.data.prod_condition);
                $('textarea#description').val(response.data.prod_description);
              }
        });
    });
    //--------------Xóa sản phẩm----------------//
    $('.btn-destroy-product').on('click',function(){
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
     //--------------Xóa tin tức----------------//
     $('.btn-destroy-news').on('click',function(){
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
    //--------------Hiển thị content slider----------------//
    $('.btn-info-slider').on('click',function(){
        var url = $(this).attr('data-url');
       $.ajax({
           type: 'get',
           url :  url ,
           datatype: 'json',
           success: function(response){             
               $('textarea#slider_content').val(response.data.slider_content);
             },
       });
    });
     //--------------Xóa tin tức----------------//
     $('.btn-destroy-slider').on('click',function(){
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
    
  
   
});