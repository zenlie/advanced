<?php 

namespace backend\models\search;

use yii\data\ActiveDataProvider;
use backend\models\DafBuku;

class DafBukuSearch extends DafBuku
{
    public function rules()
    {
        return [
            [['kategori_id', 'judul', 'pengarang', 'tahun_terbit'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = DafBuku::find();
        $query->joinWith(['kategori']);    

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3
            ]
        ]);

        $this->load($params);
        // var_dump( $this->judul); die;
        if (! $this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'kategori_id', $this->kategori_id]);
        $query->andFilterWhere(['like', 'judul', $this->judul]);
        $query->andFilterWhere(['like', 'pengarang', $this->pengarang]);
        $query->andFilterWhere(['like', 'tahun_terbit', $this->tahun_terbit]);

        return $dataProvider;
    }    
}