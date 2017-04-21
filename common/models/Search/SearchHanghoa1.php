<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hanghoa;

/**
 * SearchHanghoa represents the model behind the search form about `common\models\Hanghoa`.
 */
class SearchHanghoa extends Hanghoa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'soluong', 'luotxem', 'loaihang_id', 'nhacungcap_id', 'thuonghieu_id'], 'integer'],
            [['mahang', 'tenhang', 'tinhtrang', 'noibat', 'banchay', 'motangangon', 'motachitiet', 'code', 'created', 'updated', 'ngaynhap'], 'safe'],
            [['dongia'], 'number'],
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
        $query = Hanghoa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'soluong' => $this->soluong,
            'dongia' => $this->dongia,
            'luotxem' => $this->luotxem,
            'loaihang_id' => $this->loaihang_id,
            'nhacungcap_id' => $this->nhacungcap_id,
            'thuonghieu_id' => $this->thuonghieu_id,
            'created' => $this->created,
            'updated' => $this->updated,
            'ngaynhap' => $this->ngaynhap,
        ]);

        $query->andFilterWhere(['like', 'mahang', $this->mahang])
            ->andFilterWhere(['like', 'tenhang', $this->tenhang])
            ->andFilterWhere(['like', 'tinhtrang', $this->tinhtrang])
            ->andFilterWhere(['like', 'noibat', $this->noibat])
            ->andFilterWhere(['like', 'banchay', $this->banchay])
            ->andFilterWhere(['like', 'motangangon', $this->motangangon])
            ->andFilterWhere(['like', 'motachitiet', $this->motachitiet])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
