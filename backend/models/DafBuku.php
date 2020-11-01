<?php

namespace backend\models;

use Yii;

class DafBuku extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'daf_buku';
    }

    public function rules()
    {
        return [
            [['kategori_id', 'judul', 'pengarang', 'tahun_terbit'], 'required'],
            [['kategori_id'], 'integer'],
            [['tahun_terbit'], 'safe'],
            [['judul', 'pengarang'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'buku_id' => 'Buku ID',
            'kategori_id' => 'Kategori ID',
            'judul' => 'Judul',
            'pengarang' => 'Pengarang',
            'tahun_terbit' => 'Tahun Terbit',
        ];
    }

    public function getKategori()
    {
        return $this->hasOne(DafKategoriBuku::className(), ['id' => 'kategori_id']);
    }
}
