<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%discount}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property double $total_amount
 * @property double $discount
 * @property string $date_start
 * @property string $date_end
 * @property string $date_added
 * @property integer $status
 * @property string $description
 *
 * @property DiscountCategory[] $discountCategories
 * @property DiscountProduct[] $discountProducts
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%discount}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'total_amount', 'discount', 'date_start', 'date_end', 'date_added', 'status'], 'required'],
            [['type'], 'string'],
            [['total_amount', 'discount'], 'number'],
            [['date_start', 'date_end', 'date_added'], 'safe'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 255],
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
            'total_amount' => 'Total Amount',
            'discount' => 'Discount',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'date_added' => 'Date Added',
            'status' => 'Status',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountCategories()
    {
        return $this->hasMany(DiscountCategory::className(), ['discount_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountProducts()
    {
        return $this->hasMany(DiscountProduct::className(), ['discount_id' => 'id']);
    }
}
