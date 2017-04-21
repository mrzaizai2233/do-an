/**
 * Created by TUANDAT on 24/03/2017.
 */
$('.xoaanh').click(function(){
    var id=$(this).data('id');
    $.ajax({
        url:'/backend/web/hang-hoa/xoaanh',
        type:'POST',
        data:{
            id:id
        },
        success:function(data){
            $("button[data-id="+data+"]").hide();
            $("img[data-id="+data+"]").hide();
            // $('img').filter(function(){ return $(this).data('id')   == data}).hide();
        }
    });
});