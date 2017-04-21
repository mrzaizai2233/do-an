<?php

namespace common\models\Search;

use common\models\Donhangchitiet;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Donhang;

/**
 * SearchDonhang represents the model behind the search form about `common\models\Donhang`.
 */
class SearchDonhangchitiet extends Donhangchitiet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }


    /**
     * @inheritdoc
     */
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($idDonhang=-1)
    {
        $query = Donhangchitiet::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>2
            ],
            'sort'=>[
                'defaultOrder'=>[
                    'thanhtien'=>SORT_DESC
                ]
            ]
        ]);
        $query->andFilterWhere(['donhang_id'=>$idDonhang]);
        return $dataProvider;
    }
}
