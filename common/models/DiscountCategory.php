<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%discount_category}}".
 *
 * @property integer $id
 * @property integer $discount_id
 *
 * @property Discount $discount
 * @property Loaihang[] $loaihangs
 */
class DiscountCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%discount_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discount_id'], 'required'],
            [['discount_id'], 'integer'],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::className(), 'targetAttribute' => ['discount_id' => 'id']],
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
    public function getLoaihangs()
    {
        return $this->hasMany(Loaihang::className(), ['discount_category_id' => 'id']);
    }
}
