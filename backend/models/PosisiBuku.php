<?php

namespace backend\models;

use Yii;

class PosisiBuku extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'posisi_buku';
    }

    public function rules()
    {
        return [
            [['rak_id', 'buku_id'], 'required'],
            [['rak_id', 'buku_id'], 'integer'],
            [['rak_id'], 'exist', 'skipOnError' => true, 'targetClass' => RakBuku::className(), 'targetAttribute' => ['rak_id' => 'id']],
            [['buku_id'], 'exist', 'skipOnError' => true, 'targetClass' => DafBuku::className(), 'targetAttribute' => ['buku_id' => 'buku_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rak_id' => 'Rak ID',
            'buku_id' => 'Buku ID',
        ];
    }

    public function getRak()
    {
        return $this->hasOne(RakBuku::className(), ['id' => 'rak_id']);
    }

    public function getBuku()
    {
        return $this->hasOne(DafBuku::className(), ['buku_id' => 'buku_id']);
    }
}
