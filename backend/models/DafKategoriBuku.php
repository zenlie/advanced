<?php

namespace backend\models;

use Yii;

class DafKategoriBuku extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'daf_kategori_buku';
    }

    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    public function getDafBukus()
    {
        return $this->hasMany(DafBuku::className(), ['kategori_id' => 'id']);
    }
}
