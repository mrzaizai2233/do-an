<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chitiethang".
 *
 * @property integer $id
 * @property string $mahang
 * @property string $tenhang
 * @property string $tenloaihang
 * @property string $tenthuonghieu
 * @property string $tennhacungcap
 * @property double $dongia
 * @property string $noibat
 * @property string $banchay
 * @property string $motangangon
 * @property string $code
 * @property string $motachitiet
 * @property string $tinhtrang
 * @property string $file
 */
class Chitiethang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chitiethang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['mahang', 'tenhang', 'tenloaihang', 'tenthuonghieu', 'dongia', 'noibat', 'banchay', 'tinhtrang'], 'required'],
            [['dongia'], 'number'],
            [['noibat', 'banchay', 'motachitiet', 'tinhtrang'], 'string'],
            [['mahang'], 'string', 'max' => 45],
            [['tenhang', 'code'], 'string', 'max' => 200],
            [['tenloaihang', 'tenthuonghieu', 'tennhacungcap'], 'string', 'max' => 100],
            [['motangangon'], 'string', 'max' => 500],
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mahang' => 'Mahang',
            'tenhang' => 'Tenhang',
            'tenloaihang' => 'Tenloaihang',
            'tenthuonghieu' => 'Tenthuonghieu',
            'tennhacungcap' => 'Tennhacungcap',
            'dongia' => 'Dongia',
            'noibat' => 'Noibat',
            'banchay' => 'Banchay',
            'motangangon' => 'Motangangon',
            'code' => 'Code',
            'motachitiet' => 'Motachitiet',
            'tinhtrang' => 'Tinhtrang',
            'file' => 'File',
        ];
    }
}
