<?php

namespace backend\models;

use Yii;

class HargaBuku extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'harga_buku';
    }

    public function rules()
    {
        return [
            [['buku_id', 'harga'], 'required'],
            [['buku_id'], 'integer'],
            [['harga'], 'string', 'max' => 100],
            [['buku_id'], 'exist', 'skipOnError' => true, 'targetClass' => DafBuku::className(), 'targetAttribute' => ['buku_id' => 'buku_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buku_id' => 'Buku ID',
            'harga' => 'Harga',
        ];
    }

    public function getBuku()
    {
        return $this->hasOne(DafBuku::className(), ['buku_id' => 'buku_id']);
    }
}
