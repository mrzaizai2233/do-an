<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chucnang".
 *
 * @property integer $id
 * @property string $viettat
 * @property string $name
 * @property string $mota
 * @property string $nhom
 *
 * @property VaitroChucnang[] $vaitroChucnangs
 */
class Chucnang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chucnang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['viettat', 'name', 'nhom'], 'required'],
            [['viettat', 'name', 'mota', 'nhom'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'viettat' => 'Viettat',
            'name' => 'Name',
            'mota' => 'Mota',
            'nhom' => 'Nhom',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaitroChucnangs()
    {
        return $this->hasMany(VaitroChucnang::className(), ['chucnang_id' => 'id']);
    }
}
