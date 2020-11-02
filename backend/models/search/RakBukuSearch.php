<?php 

namespace backend\models\search;

use yii\data\ActiveDataProvider;
use backend\models\RakBuku;

class RakBukuSearch extends RakBuku
{
    public function rules()
    {
        return [
            [['no_rak'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = RakBuku::find();
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
        $query->andFilterWhere(['like', 'no_rak', $this->no_rak]);   
        return $dataProvider;
    }    
}