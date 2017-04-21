<?php
/**
 * Created by PhpStorm.
 * User: TUANDAT
 * Date: 28/03/2017
 * Time: 10:38 CH
 * @var $vaiTro Vaitro
 */
use common\models\Vaitro;
use yii\bootstrap\Html; ?>
<div class="thongbao alert alert-success">
    
</div>
<div class="panel panel-green">
    <div class="panel-heading">Phân quyền</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th></th>

                    <?php foreach ($vaiTros as $index => $vaiTro): ?>
                        <th><?= $vaiTro->name ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($nhomChucNang as $i => $chucnang):?>
                    <tr class="panel-heading">
                        <td colspan="<?=count($vaiTros)+1?>" class="text-center"><h4><?=$chucnang->nhom?></h4></td>
                    </tr>
                    <?php foreach ($chucNangTheoNhom[$chucnang->nhom] as  $chucnang1):?>
                        <tr>
                            <td><strong><?=$chucnang1->name?></strong></td>
                            <?php foreach ($vaiTros as $vaitro1):?>
                                <td class="text-center"><?php
                                    $isTrue=0;
                                    foreach ($datas as $data){
                                            if($chucnang1->id==$data->chucnang_id &&$vaitro1->id==$data->vaitro_id)
                                                $isTrue=1;
                                    }
                                    if($isTrue==1)
                                    echo Html::checkbox("vaitrochucnang[{$chucnang1->id}][{$vaitro1->id}]",true);
                                    else
                                        echo Html::checkbox("vaitrochucnang[{$chucnang1->id}][{$vaitro1->id}]",false);
                                    ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<button class="btn btn-save btn-success btn-save-phanquyen">
    <i class="fa fa-save"></i>Lưu lại
</button>
<?php
$this->registerJsFile(Yii::$app->urlManager->baseUrl.'/../giaodien/giaodien1/assets/js/jsview/phanquyen.js',['depends'=>['backend\assets\Giaodien2'],'position'=>yii\web\View::POS_END]);

?>