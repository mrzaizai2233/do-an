<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%option_key}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $sort_order
 *
 * @property OptionValue[] $optionValues
 * @property ProductOptionKey[] $productOptionKeys
 */
class OptionKey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%option_key}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['sort_order'], 'string', 'max' => 45],
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
            'type' => 'Type',
            'sort_order' => 'Sort Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::className(), ['option_key_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptionKeys()
    {
        return $this->hasMany(ProductOptionKey::className(), ['option_key_id' => 'id']);
    }
}
