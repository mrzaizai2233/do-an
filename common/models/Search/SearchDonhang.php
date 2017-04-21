<?php

namespace common\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Donhang;

/**
 * SearchDonhang represents the model behind the search form about `common\models\Donhang`.
 */
class SearchDonhang extends Donhang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [[ 'soluong'], 'integer'],
            [['hoten', 'diachi', 'email', 'dienthoai', 'ngaylap', 'ghichu'], 'safe'],
            [['tongtien'], 'number'],
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
        $query = Donhang::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>5
            ]
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
            'tongtien' => $this->tongtien,
//            'ngaylap' => $this->ngaylap,
            'soluong' => $this->soluong,
        ]);
        if(isset($_POST['ngaybatdau'])&&isset($_POST['ngayketthuc'])){
            $query->andFilterWhere(['>=', 'ngaylap', $_POST['ngaybatdau']])
                ->andFilterWhere(['<=', 'ngaylap', $_POST['ngayketthuc']]);
        }
        $query->andFilterWhere(['like', 'hoten', $this->hoten])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'dienthoai', $this->dienthoai])
            ->andFilterWhere(['like', 'ghichu', $this->ghichu]);

        return $dataProvider;
    }
}
