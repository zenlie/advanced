<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "harga_buku".
 *
 * @property int $id
 * @property int $buku_id
 * @property string $harga
 *
 * @property DafBuku $buku
 */
class HargaBuku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'harga_buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buku_id', 'harga'], 'required'],
            [['buku_id'], 'integer'],
            [['harga'], 'string', 'max' => 100],
            [['buku_id'], 'exist', 'skipOnError' => true, 'targetClass' => DafBuku::className(), 'targetAttribute' => ['buku_id' => 'buku_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buku_id' => 'Buku ID',
            'harga' => 'Harga',
        ];
    }

    /**
     * Gets query for [[Buku]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuku()
    {
        return $this->hasOne(DafBuku::className(), ['buku_id' => 'buku_id']);
    }
}
