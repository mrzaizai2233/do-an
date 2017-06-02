<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "option_value_of_option_key_product".
 *
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $description
 * @property integer $option_key_id
 * @property integer $option_value_id
 * @property integer $hanghoa_id
 */
class OptionValueOfOptionKeyProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option_value_of_option_key_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'option_key_id', 'option_value_id', 'hanghoa_id'], 'integer'],
            [['name', 'option_key_id', 'option_value_id', 'hanghoa_id'], 'required'],
            [['image', 'description'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'name' => 'Name',
            'description' => 'Description',
            'option_key_id' => 'Option Key ID',
            'option_value_id' => 'Option Value ID',
            'hanghoa_id' => 'Hanghoa ID',
        ];
    }
}
