<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vaitro_chucnang".
 *
 * @property integer $id
 * @property integer $vaitro_id
 * @property integer $chucnang_id
 *
 * @property Chucnang $chucnang
 * @property Vaitro $vaitro
 */
class VaitroChucnang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vaitro_chucnang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vaitro_id', 'chucnang_id'], 'required'],
            [['vaitro_id', 'chucnang_id'], 'integer'],
            [['chucnang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chucnang::className(), 'targetAttribute' => ['chucnang_id' => 'id']],
            [['vaitro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vaitro::className(), 'targetAttribute' => ['vaitro_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vaitro_id' => 'Vaitro ID',
            'chucnang_id' => 'Chucnang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChucnang()
    {
        return $this->hasOne(Chucnang::className(), ['id' => 'chucnang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaitro()
    {
        return $this->hasOne(Vaitro::className(), ['id' => 'vaitro_id']);
    }
}
