<?php
/**
 * Created by PhpStorm.
 * User: TUANDAT
 * Date: 16/04/2017
 * Time: 12:14 SA
 */
use yii\helpers\Html;?>
<?=Html::beginForm('','post',['enctype'=>'multipart/form-data']);
echo Html::fileInput('filehanghoa');
echo Html::submitButton('Import');
?>
<?=Html::endForm()?>
