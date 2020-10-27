<?php 

namespace backend\models\search;

use yii\data\ActiveDataProvider;
use backend\models\PosisiBuku;

class PosisiBukuSearch extends PosisiBuku
{
    public function rules()
    {
        return [
            [['rak_id', 'buku_id'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = PosisiBuku::find();
        $query->joinWith(['rak', 'buku']);    

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        $this->load($params);

        if (! $this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'rak_id', $this->rak_id]);
        $query->andFilterWhere(['like', 'posisi_buku.buku_id', $this->buku_id]);
    
        return $dataProvider;
    }    
}