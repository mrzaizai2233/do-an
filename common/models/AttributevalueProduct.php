<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributevalue_product}}".
 *
 * @property integer $hanghoa_id
 * @property integer $attributevalue_id
 * @property integer $id
 *
 * @property Attributevalue $attributevalue
 * @property Hanghoa $hanghoa
 */
class AttributevalueProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributevalue_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hanghoa_id', 'attributevalue_id'], 'required'],
            [['hanghoa_id', 'attributevalue_id'], 'integer'],
            [['attributevalue_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributevalue::className(), 'targetAttribute' => ['attributevalue_id' => 'id']],
            [['hanghoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hanghoa::className(), 'targetAttribute' => ['hanghoa_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hanghoa_id' => 'Hanghoa ID',
            'attributevalue_id' => 'Attributevalue ID',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributevalue()
    {
        return $this->hasOne(Attributevalue::className(), ['id' => 'attributevalue_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoa()
    {
        return $this->hasOne(Hanghoa::className(), ['id' => 'hanghoa_id']);
    }
}
