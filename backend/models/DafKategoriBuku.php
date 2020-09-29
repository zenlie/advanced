<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "daf_kategori_buku".
 *
 * @property int $id
 * @property string $nama
 *
 * @property DafBuku[] $dafBukus
 */
class DafKategoriBuku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'daf_kategori_buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[DafBukus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDafBukus()
    {
        return $this->hasMany(DafBuku::className(), ['kategori_id' => 'id']);
    }
}
