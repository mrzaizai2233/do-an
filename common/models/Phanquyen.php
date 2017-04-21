<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phanquyen".
 *
 * @property integer $iduser
 * @property integer $idvaitro
 * @property integer $idchucnang
 * @property string $username
 * @property string $vaitro
 * @property string $chucnang
 * @property string $viettat
 * @property string $nhom
 * @property string $mota
 */
class Phanquyen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phanquyen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'idvaitro', 'idchucnang'], 'integer'],
            [['username', 'vaitro', 'chucnang', 'viettat', 'nhom'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['vaitro', 'chucnang', 'viettat', 'nhom', 'mota'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduser' => 'Iduser',
            'idvaitro' => 'Idvaitro',
            'idchucnang' => 'Idchucnang',
            'username' => 'Username',
            'vaitro' => 'Vaitro',
            'chucnang' => 'Chucnang',
            'viettat' => 'Viettat',
            'nhom' => 'Nhom',
            'mota' => 'Mota',
        ];
    }
    public function getUser($chucnang){

//        $tenchucnang = implode("','",$chucnang);
            $data = $this->find()->where("viettat ='{$chucnang}'")->groupBy(['username'])->all();
        $usernames=[];
        foreach ($data as $index => $item) {
            $usernames[]=$item->username;
        }
        return $usernames;
    }
    public function isAccess($chucnang){
        if(Yii::$app->user->isGuest)
            return false;
        return in_array(Yii::$app->user->identity->username,$this->getUser($chucnang));
    }
}
