/**
 * Created by TUANDAT on 19/03/2017.
 */
$(document).ready(function(){
    $('#typehead').typeahead({
        source: function (query, result) {
            $.ajax({
                url: '/site/typehead',
                method: "post",
                data: {query: query},
                dataType: "json",
                success: function (data) {
                    result($.map(data, function (item) {
                        return item;
                    }))
                }
            })
        }

    });
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
                toastr.success("Thông báo", "thêm hàng thành công");
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                $('#cart-block').html('');
                $('#cart-block').html(data.minicart);
                $('#myModalLabel').html("thông báo đặt hàng");
                $('#myModal .modal-body').html(data.alert);
                //$('#myModal').modal("show");
            }
        })


    })
})