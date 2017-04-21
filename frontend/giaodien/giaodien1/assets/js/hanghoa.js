/**
 * Created by TUANDAT on 19/03/2017.
 */
$(document).ready(function(){
    $(".btn-add-cart").click(function(){
        var soluong= $("#option-product-qty").val();
        var idProduct = $("#idhanghoa").val();
       $.ajax({
           url:'/site/addcart',
           data:{soluong:soluong,idProduct:idProduct},
           type:'POST',
           dataType:'json',
           beforeSend:function(){
           },
           success:function(data){
               $('#cart-block').html('');
               $('#cart-block').html(data.minicart);
               $('#myModalLabel').html("thông báo đặt hàng");
               $('#myModal .modal-body').html(data.alert);
               $('#myModal').modal("show");
           }
       })


    })
    $(".add-to-cart").click(function(){
        var soluong= 1;
        var idProduct = $(this).attr('data-id');
        $.ajax({
            url:'/site/addcart',
            data:{soluong:soluong,idProduct:idProduct},
            type:'POST',
            dataType:'json',
            beforeSend:function(){
            },
            success:function(data){
                $('#cart-block').html('');
                $('#cart-block').html(data.minicart);
                $('#myModalLabel').html("thông báo đặt hàng");
                $('#myModal .modal-body').html(data.alert);
                $('#myModal').modal("show");
            }
        })


    })
})