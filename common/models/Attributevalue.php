<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributevalue}}".
 *
 * @property integer $id
 * @property string $AttributeValueName
 * @property string $AttributeValueDesc
 * @property integer $attributekey_id
 *
 * @property Attributekey $attributekey
 * @property AttributevalueProduct[] $attributevalueProducts
 */
class Attributevalue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributevalue}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attributekey_id'], 'required'],
            [['attributekey_id'], 'integer'],
            [['AttributeValueName'], 'string', 'max' => 45],
            [['AttributeValueDesc'], 'string', 'max' => 100],
            [['attributekey_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributekey::className(), 'targetAttribute' => ['attributekey_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'AttributeValueName' => 'Attribute Value Name',
            'AttributeValueDesc' => 'Attribute Value Desc',
            'attributekey_id' => 'Attributekey ID',
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
    public function getAttributevalueProducts()
    {
        return $this->hasMany(AttributevalueProduct::className(), ['attributevalue_id' => 'id']);
    }
}
