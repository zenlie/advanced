<?php 

namespace backend\models\search;

use yii\data\ActiveDataProvider;
use backend\models\DafKategoriBuku;

class DafKategoriBukuSearch extends DafKategoriBuku
{
    public function rules()
    {
        return [
            [['nama'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = DafKategoriBuku::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $this->load($params);
        // var_dump( $this->nama); die;
        if (! $this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'nama', $this->nama]);
        return $dataProvider;
    }    
}