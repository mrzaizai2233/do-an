<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_option_value}}".
 *
 * @property integer $id
 * @property integer $option_value_id
 * @property integer $hanghoa_id
 *
 * @property Hanghoa $hanghoa
 * @property OptionValue $optionValue
 */
class ProductOptionValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_option_value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_value_id', 'hanghoa_id'], 'required'],
            [['option_value_id', 'hanghoa_id'], 'integer'],
            [['hanghoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hanghoa::className(), 'targetAttribute' => ['hanghoa_id' => 'id']],
            [['option_value_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionValue::className(), 'targetAttribute' => ['option_value_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'option_value_id' => 'Option Value ID',
            'hanghoa_id' => 'Hanghoa ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoa()
    {
        return $this->hasOne(Hanghoa::className(), ['id' => 'hanghoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValue()
    {
        return $this->hasOne(OptionValue::className(), ['id' => 'option_value_id']);
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
