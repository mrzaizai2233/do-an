<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vaitronguoidung".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $vaitro_id
 *
 * @property User $user
 * @property Vaitro $vaitro
 */
class Vaitronguoidung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vaitronguoidung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'vaitro_id'], 'required'],
            [['user_id', 'vaitro_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['vaitro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vaitro::className(), 'targetAttribute' => ['vaitro_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'vaitro_id' => 'Vaitro ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaitro()
    {
        return $this->hasOne(Vaitro::className(), ['id' => 'vaitro_id']);
    }
}
