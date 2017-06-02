<?php
/**
 * Created by PhpStorm.
 * User: TUANDAT
 * Date: 19/05/2017
 * Time: 11:47 CH
 */
use yii\bootstrap\Html; ?>


<tr>
    <td>
            <div class="form-group">
                <?= Html::dropDownList("optionkey[{$index}]",'',$options,['class'=>'form-control']) ?>
                <div class="help-block"></div>
            </div>
    </td>
    <td>
        <table class="table table-striped table-bordered table-hover" id="table-option-value">
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="2">
                    <input type="button"
                           class="form-control btn btn-primary themThuocTinh"
                           value="Thêm">
                </td>
            </tr>
            </tfoot>
        </table>
    </td>
    <td></td>
</tr>

