<?php
//
//namespace backend\models;
//
//use Yii;
//use backend\models\Category;
//
///**
// * This is the model class for table "category".
// *
// * @property integer $id
// * @property string $name
// * @property string $slug
// * @property integer $parent
// * @property integer $status
// * @property integer $created_at
// * @property integer $updated_at
// */
//class Category extends \yii\db\ActiveRecord
//{
//    /**
//     * @inheritdoc
//     */
//    public $mainId;
//    public $_cats=[];
//    public static function tableName()
//    {
//        return 'category';
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function rules()
//    {
//        return [
//            [['created_at', 'updated_at'], 'required',],
//            [['parent', 'status', 'created_at', 'updated_at'], 'integer'],
//            [['name', 'slug'], 'string', 'max' => 255],
//            [['name'], 'unique'],
//            [['slug'], 'unique'],
//            ['name', 'required', 'message' => 'Xin hãy nhập tên vào.'],
//            ['slug', 'required', 'message' => 'Xin hãy nhập đường dẫn.'],
//        ];
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => 'ID',
//            'name' => 'Tên',
//            'slug' => 'Đường dẫn',
//            'parent' => 'Danh mục cha',
//            'status' => 'Trạng thái',
//            'created_at' => 'Created At',
//            'updated_at' => 'Updated At',
//        ];
//    }
//    public function getAllCategory(){
//
//        return Category::find()->All();
//        //return $category = (new \yii\db\Query())->select(['id', 'name'])->from('category')->all();
//        
//
//    }
//    public function getParentName($id){
//        if($id==0){
//            return 'Root';
//        }
//        else {
//            $nameParent= Category::findOne($id);
//            return $nameParent['name'];
//        }
//    }
//
//    // public function getParent($parent=0,$level=''){
//    //     $data=Category::find()->where(['parent'=>$parent])->all();
//    //         foreach ($data as $item) {
//    //                 $this->_cats[$item->id]=$level.$item['name'];
//    //                 $this->getParent($item->id,$level.$item['name']." > ");
//    //         }
//    //     return $this->_cats;
//    // }
//    public function getId(){
//        $this->mainId=$this->name;
//    }
//}
