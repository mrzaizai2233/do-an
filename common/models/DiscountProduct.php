<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%discount_product}}".
 *
 * @property integer $id
 * @property integer $discount_id
 * @property integer $hanghoa_id
 *
 * @property Discount $discount
 * @property Hanghoa $hanghoa
 */
class DiscountProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%discount_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discount_id', 'hanghoa_id'], 'required'],
            [['discount_id', 'hanghoa_id'], 'integer'],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::className(), 'targetAttribute' => ['discount_id' => 'id']],
            [['hanghoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hanghoa::className(), 'targetAttribute' => ['hanghoa_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discount_id' => 'Discount ID',
            'hanghoa_id' => 'Hanghoa ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::className(), ['id' => 'discount_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHanghoa()
    {
        return $this->hasOne(Hanghoa::className(), ['id' => 'hanghoa_id']);
    }
}
