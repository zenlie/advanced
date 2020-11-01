<?php 

namespace backend\models\search;

use yii\data\ActiveDataProvider;
use backend\models\HargaBuku;

class HargaBukuSearch extends HargaBuku
{
    public function rules()
    {
        return [
            [['buku_id', 'harga'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = HargaBuku::find();  

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $this->load($params);

        if (! $this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'buku_id', $this->buku_id]);
        $query->andFilterWhere(['like', 'harga', $this->harga]);

        return $dataProvider;
    }    
}