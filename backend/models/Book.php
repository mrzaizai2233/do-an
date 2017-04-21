<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cate
 * @property string $slug
 * @property string $image
 * @property string $desc
 * @property string $content
 * @property integer $price
 * @property integer $quantiny
 * @property string $author
 * @property integer $page
 * @property integer $status
 * @property integer $publish_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file=null;
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'content', 'price', 'quantiny','page'], 'required'],
            [['cate','price', 'quantiny', 'page', 'status', 'created_at', 'updated_at'], 'integer'],
            [['publish_at'], 'date'],
            [['content'], 'string'],
            [['name', 'slug', 'image', 'desc'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 100],
            [['name'], 'unique'],
            [['slug'], 'unique'],
            [['file'], 'file','skipOnEmpty' => true, 'extensions' => 'png, jpg','maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'file',
            'name' => 'Name',
            'cate' => 'Cate',
            'slug' => 'Slug',
            'image' => 'Image',
            'desc' => 'Desc',
            'content' => 'Content',
            'price' => 'Price',
            'quantiny' => 'Quantiny',
            'author' => 'Author',
            'page' => 'Page',
            'status' => 'Status',
            'publish_at' => 'Publish At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function upload(){

            if($this->file){
                echo "loi o day";

                foreach ($this->file as  $value) {
                    $value->saveAs('../../upload/'.$value->name);
                    echo "up load:".$value->name;
                }
                echo "het li";
                return true;
            }
            return false;
    }
}
