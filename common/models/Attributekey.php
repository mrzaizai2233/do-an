<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributekey}}".
 *
 * @property integer $id
 * @property string $AttributeName
 * @property string $AttributeDesc
 *
 * @property AttributekeyProduct[] $attributekeyProducts
 * @property Attributevalue[] $attributevalues
 */
class Attributekey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributekey}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AttributeName', 'AttributeDesc'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'AttributeName' => 'Attribute Name',
            'AttributeDesc' => 'Attribute Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributekeyProducts()
    {
        return $this->hasMany(AttributekeyProduct::className(), ['attributekey_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributevalues()
    {
        return $this->hasMany(Attributevalue::className(), ['attributekey_id' => 'id']);
    }
}
