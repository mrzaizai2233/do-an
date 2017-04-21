<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use common\models\Loaihang;
use common\models\Thuonghieu;
use common\models\Nhacungcap;
class base
{
   
    public static function convertStr($str) {

        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
     return $str; // Trả về chuỗi đã chuyển
}
   public static function dmy2ymd($data,$splash='/'){

       if(strpos($data,$splash)==false)
            $splash='-';
       $arr_date = explode($splash,$data);
     return "{$arr_date[2]}-{$arr_date[1]}-{$arr_date[0]}";
   }
    public static function getTinhTrang($value){
        if($value== 'conhang')return '<span class="label label-primary">Còn hàng</span>'; return '<span class="label label-danger">Hết Hàng</span>';
    }
    public static function getTinhTrang1($value){
        if($value== 'conhang')return "Còn hàng"; return "Hết Hàng";
    }
    public static function getNoiBat($value){
        if($value=='noibat') return '<span class="label label-primary">Nổi bật</span>'; return '<span class="label label-danger">Không nôi bật</span>';
    }
    public static function getBanChay($value){
        if($value=='banchay') return '<span class="label label-primary">Bán chạy</span>'; return '<span class="label label-danger">Không bán chạy</span>';
    }
    public static function getNameThuongHieu($value){
        $model = Thuonghieu::findOne(['id'=>$value]);
        return $model->tenthuonghieu;
    }
    public static function getNameLoaiHang($value){
        $model = Loaihang::findOne(['id'=>$value]);
        return $model->tenloaihang;
    }
    public static function getNameNhaCungCap($value){
        $model = Nhacungcap::findOne(['id'=>$value]);
        return $model->tennhacungcap;
    }
    public  static function checkMenuMutiLevel($datas,$parent=0,$countMuti=0){
        echo "firstId={$parent}";
        $newParent = $parent;
        foreach ($datas as $index => $loaihang) {
//            echo "parent={$newParent}";
            if ($newParent==$loaihang->parent){
//                            echo "--Parent Trong Forek{$parent}";
                echo "---parent={$newParent} && id={$loaihang->parent}";
//                echo "--check {$loaihang->id}";
                $countMuti++;
                self::checkMenuMutiLevel($datas,$loaihang->id,$countMuti);
            }
            if($countMuti==2){
                $countMuti=2;
                break;
            }
        }
        return $countMuti;
    }

    public static function checkMutiLV($parent){
        $datas=Loaihang::find()->all();
        $count=0;
        foreach ($datas as $index => $data) {
            if($data->parent==$parent){
                $count=1;
                foreach ($datas as $data1) {
                    if($data1->parent==$data->id){
                        $count=2;
                    }
                }
                if($count==2)
                    break;
            }
        }
        return $count;
    }
    public static function checkImageProduct($img){
        if(count($img->hinhanhs)>0){
            return $img->hinhanhs[0]->file;
        }
        return 'p13.jpg';
    }

}
