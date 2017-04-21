<?php

namespace common\models;

use Yii;
use common\models\base;
use yii\db\Expression;
use yii\web\UploadedFile;
/**
 * This is the model class for table "hanghoa".
 *
 * @property integer $id
 * @property string $mahang
 * @property string $tenhang
 * @property integer $soluong
 * @property double $dongia
 * @property string $tinhtrang
 * @property string $noibat
 * @property string $banchay
 * @property string $motangangon
 * @property string $motachitiet
 * @property integer $luotxem
 * @property integer $loaihang_id
 * @property integer $nhacungcap_id
 * @property integer $thuonghieu_id
 * @property string $code
 * @property string $created
 * @property string $updated
 * @property string $ngaynhap
 *
 * @property Donhangchitiet[] $donhangchitiets
 * @property Loaihang $loaihang
 * @property Nhacungcap $nhacungcap
 * @property Thuonghieu $thuonghieu
 * @property Hinhanh[] $hinhanhs
 */
class Hanghoa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hanghoa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mahang', 'tenhang', 'soluong', 'dongia', 'tinhtrang', 'noibat', 'banchay', 'loaihang_id', 'nhacungcap_id', 'thuonghieu_id','ngaynhap'],
                'required',
                'message'=>'{attribute} không được để trống'],
            [['soluong', 'luotxem', 'loaihang_id', 'nhacungcap_id', 'thuonghieu_id'], 'integer'],
            [['dongia'], 'double'],
            [['tinhtrang', 'noibat', 'banchay', 'motachitiet'], 'string'],
            [['created', 'updated', 'ngaynhap'], 'safe'],
            [['mahang'], 'string', 'max' => 45],
            [['tenhang', 'code'], 'string', 'max' => 200],
            [['motangangon'], 'string', 'max' => 500],
            [['loaihang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loaihang::className(), 'targetAttribute' => ['loaihang_id' => 'id']],
            [['nhacungcap_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nhacungcap::className(), 'targetAttribute' => ['nhacungcap_id' => 'id']],
            [['thuonghieu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Thuonghieu::className(), 'targetAttribute' => ['thuonghieu_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mahang' => 'Mã hàng',
            'tenhang' => 'Tên hàng',
            'soluong' => 'Số lượng',
            'dongia' => 'Đơn giá',
            'tinhtrang' => 'Tình trạng',
            'noibat' => 'Nổi bật',
            'banchay' => 'Bán chạy',
            'motangangon' => 'Mô tả ngắn gọn',
            'motachitiet' => 'Mô tả chi tiết',
            'luotxem' => 'Lượt xem',
            'loaihang_id' => 'Loại hàng ID',
            'nhacungcap_id' => 'Nhà cung cấp ID',
            'thuonghieu_id' => 'Thương hiệu ID',
            'code' => 'Code',
            'created' => 'Created',
            'updated' => 'Updated',
            'ngaynhap' => 'Ngày Nhập',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonhangchitiets()
    {
        return $this->hasMany(Donhangchitiet::className(), ['hanghoa_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaihang()
    {
        return $this->hasOne(Loaihang::className(), ['id' => 'loaihang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNhacungcap()
    {
        return $this->hasOne(Nhacungcap::className(), ['id' => 'nhacungcap_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThuonghieu()
    {
        return $this->hasOne(Thuonghieu::className(), ['id' => 'thuonghieu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHinhanhs()
    {
        return $this->hasMany(Hinhanh::className(), ['hanghoa_id' => 'id']);
    }

    public function beforeSave($insert)
    {

        if($insert){
            $this->code = base::convertStr($this->tenhang).'-'.time();
            $this->created = new Expression('NOW()');
        }
        else {
            $this->updated = new Expression('NOW()');
        }
        $this->ngaynhap = new Expression('NOW()');
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    public function afterSave($insert, $changedAttributes)
    {

        $files= UploadedFile::getInstancesByName('HinhAnhs');

        foreach ($files as $file){
            $tenFile = time().base::convertStr($file->name);
            $path=dirname(dirname(__DIR__)).'/images/'.$tenFile;
            $image = new Hinhanh();
            $image->file = $tenFile;
            $image->hanghoa_id= $this->id;
            if($image->save()){
                $file->saveAs($path);
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
    public function beforeDelete()
    {

        foreach ($this->hinhanhs as $image ){
            $image->delete();


        }
          return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }


}