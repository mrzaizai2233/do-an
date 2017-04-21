<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hinhanh".
 *
 * @property integer $id
 * @property string $file
 * @property integer $hanghoa_id
 *
 * @property Hanghoa $hanghoa
 */
class Hinhanh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hinhanh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hanghoa_id'], 'integer'],
            [['file'], 'string', 'max' => 255],
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
            'file' => 'File',
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
    public function beforeDelete()
    {
        $patch = dirname(dirname(__DIR__)).'/images/'.$this->file;
        if(file_exists($patch)){
            unlink($patch);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}