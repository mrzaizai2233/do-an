<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attributekey_product".
 *
 * @property integer $attributekey_id
 * @property integer $hanghoa_id
 * @property integer $id
 *
 * @property Attributekey $attributekey
 * @property Hanghoa $hanghoa
 */
class AttributekeyProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attributekey_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attributekey_id', 'hanghoa_id'], 'required'],
            [['attributekey_id', 'hanghoa_id'], 'integer'],
            [['attributekey_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributekey::className(), 'targetAttribute' => ['attributekey_id' => 'id']],
            [['hanghoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hanghoa::className(), 'targetAttribute' => ['hanghoa_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attributekey_id' => 'Attributekey ID',
            'hanghoa_id' => 'Hanghoa ID',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributekey()
    {
        return $this->hasOne(Attributekey::className(), ['id' => 'attributekey_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoa()
    {
        return $this->hasOne(Hanghoa::className(), ['id' => 'hanghoa_id']);
    }
}
