/**
 * Created by TUANDAT on 28/03/2017.
 */
$(document).ready(function(){
    $(document).on('click','.btn-save-phanquyen',function(){
        $.ajax({
            url:'/backend/web/user/luuphanquyen',
            data:$("input[type='checkbox']:checked").serialize(),
            type:'POST',
            dataType:'json',
            beforeSend:function (){
                $(".thongbao").html();
            },
            success:function(data){
                $(".thongbao").html('Phân quyền thành công');
                setTimeout(function(){
                    $(".thongbao").hide();
                }, 3000);
            }
        })
    });
});