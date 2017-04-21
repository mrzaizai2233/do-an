/**
 * Created by TUANDAT on 24/03/2017.
 */
function changesl(data){
    $.ajax({
        url:'updatedhct',
        type:'post',
        dataType:'json',
        data:data,
        success:function(data){
            $.pjax.reload({
                container:'#grid-donhangchitiet',
                data:{donhang:data.idDonHang},
                method:'post'
            })
            setTimeout(function(){
                $.pjax.reload({container:'#grid-donhang'})
            },500)
        },
        error:function (data) {

        }

    })
}
$(document).ready(function(){
    dateRange()
    $(document).on('click','.btn-view-don-hang',function(){
        var idDonhang = $(this).attr('id');

        $.pjax.reload({
            container:'#grid-donhangchitiet',
            data:{donhang:idDonhang},
            method:'post'});
        $("#modal-chitiet-donhang").modal("show");
    })
    $(document).on('click','.btn-xoa-dhct',function () {
        var idDHCT = $(this).attr('id');
        $.ajax({
            url:'xoadhct',
            type:"POST",
            data:{idDHCT:idDHCT},
            dataType:'json',
            success:function (data) {
                $.pjax.reload({
                    container:'#grid-donhangchitiet',
                    data:{donhang:data.idDonHang},
                    method:'post'
                })
                setTimeout(function(){
                    $.pjax.reload({container:'#grid-donhang'})
                },500)
            },
            error:function (r1, r2) {
                alert(r1.responseText)
            }
        })
    })
    $(document).on('change','.txt-soluong',function(){
        changesl($(this).serialize());
    })
    $(document).on('keyup','.txt-soluong',function(){
        changesl($(this).serialize());
    })
    $(document).on('click','.btn-print-dh',function(){
        $.ajax({
            url:'print',
            data:{idDonHang:$(this).val()},
            dataType:'json',
            type:'post',
            success:function(data){
                $("#print-range").html(data.html);
                $("#print-range").printElement();

            } ,           error:function (r1, r2) {
                alert(r1.responseText)
            }
        })
    })

})
function dateRange(){
    $('input[name="daterangepicker-default"]').daterangepicker();
    $('input[name="daterangepicker-date-time"]').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
    $('.reportrange').daterangepicker(
        {
            ranges: {
                'Hôm này': [moment(), moment()],
                'Hôm qua': [moment().subtract('days', 1), moment().subtract('days', 1)],
                '7 ngày trước': [moment().subtract('days', 6), moment()],
                '30 ngày trước': [moment().subtract('days', 29), moment()],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            startDate: moment().subtract('month', 1),
            endDate: moment()
        },
        function(start, end) {
            $('.reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        }
    );
    $('.reportrange span').html(moment().subtract('days', 29).format('DD/MM/YYYY') + ' - ' + moment().format('DD/MM/YYYY'));

    $('.reportrange').on('apply.daterangepicker', function(ev, picker) {
        $.pjax.reload({
            container:"#grid-donhang",
            data:{
                ngaybatdau:picker.startDate.format('YYYY/MM/DD'),
                ngayketthuc:picker.endDate.format('YYYY/MM/DD')
            },
            method:"post"
        })
        // $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });
}
