<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Loaihang;

/**
 * SearchLoaihang represents the model behind the search form about `common\models\Loaihang`.
 */
class SearchLoaihang extends Loaihang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent'], 'integer'],
            [['tenloaihang', 'code', 'created', 'updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Loaihang::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'updated' => $this->updated,
            'parent' => $this->parent,
        ]);

        $query->andFilterWhere(['like', 'tenloaihang', $this->tenloaihang])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
