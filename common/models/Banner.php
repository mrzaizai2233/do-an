<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $name
 * @property integer $stt
 * @property string $file
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }
    private $oldImg='';
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required','message'=>'{attribute} không được để trống'],
            [['name'], 'string', 'max' => 45],
            [['stt'], 'integer', 'max' => 11,'message'=>'số thứ tự phải là kiểu số'],
            [['stt'], 'safe'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'stt' => 'Số thứ tự',
            'file' => 'File',
        ];
    }
    public function beforeValidate()
    {
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }
    public function beforeDelete()
    {
        if($this->file!=''){
            $pathOld = dirname(dirname(__DIR__)).'/images/'.$this->file;
            if(file_exists($pathOld)){
                unlink($pathOld);
            }
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function beforeSave($insert)
    {
        $file=UploadedFile::getInstance($this,'file');
        $this->oldImg= $this->file;
        if(!empty($file)){
            if($this->oldImg!=""){
                $pathOld = dirname(dirname(__DIR__)).'/images/'.$this->oldImg;
                if(file_exists($pathOld)){
                    unlink($pathOld);
                }
            }
            $this->file=time().$file->name;
            $path= dirname(dirname(__DIR__)).'/images/'.$this->file;
            $file->saveAs($path);
        }
        else {
            $this->file = $this->oldImg;
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}