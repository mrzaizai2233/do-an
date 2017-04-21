<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vaitro".
 *
 * @property integer $id
 * @property string $name
 *
 * @property VaitroChucnang[] $vaitroChucnangs
 * @property Vaitronguoidung[] $vaitronguoidungs
 */
class Vaitro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vaitro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaitroChucnangs()
    {
        return $this->hasMany(VaitroChucnang::className(), ['vaitro_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaitronguoidungs()
    {
        return $this->hasMany(Vaitronguoidung::className(), ['vaitro_id' => 'id']);
    }
}
