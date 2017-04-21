<?php
/**
 * Created by PhpStorm.
 * User: TUANDAT
 * Date: 09/04/2017
 * Time: 6:11 CH
 */?>
<style>
    @media print {
        * {
            font-family: Arial;
        }
        .text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }

        .full-width {
            width:100%;
        }
    }
</style>
<h1>Công ty TNHH Trương Tuấn Đạt</h1>
<p>Dụ Nghĩa - Lê Thiện - An Dương - Hải Phòng</p>
<h1 class="text-center">HÓA ĐƠN BÁN HÀNG</h1>
<p class="text-center"><i>Ngày <?=date('d')?> Tháng <?=date('m')?> Năm  <?=date('y')?></i></p>
<p class="text-center">Mã hóa đơn:#<?=$donhangs->id?></p>
<table class="full-width">
    <tr>
        <td style="width:25%;">Họ tên khách</td>
        <td style="width:50%;"><?=$donhangs->hoten?></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><?=$donhangs->diachi?></td>
    </tr>
    <tr>
        <td>SĐT</td>
        <td><?=$donhangs->dienthoai?></td>
    </tr>

</table>
<table class="full-width" border="">
    <tr>
        <th>STT</th>
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php   foreach($donhangs->donhangchitiets as $index => $donhangchitiet): ?>
    <tr>
        <td><?=$index+1?></td>
        <td><?=$donhangchitiet->id?></td>
        <td><?=$donhangchitiet->hanghoa->tenhang?></td>
        <td><?=$donhangchitiet->soluong?></td>
        <td><?=number_format($donhangchitiet->dongia,0,',','.')?></td>
        <td><?=number_format($donhangchitiet->thanhtien,0,',','.')?></td>
    </tr>
        <tr>
            <td colspan="6" class="text-right">Tổng tiền</td>
        </tr>
        <tr>
            <td colspan="6" class="text-right"><?=number_format($donhangs->tongtien,0,',','.')?></td>
        </tr>
    <?php endforeach;?>
</table>