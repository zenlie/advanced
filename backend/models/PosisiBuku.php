<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "posisi_buku".
 *
 * @property int $id
 * @property int $rak_id
 * @property int $buku_id
 *
 * @property RakBuku $rak
 * @property DafBuku $buku
 */
class PosisiBuku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posisi_buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rak_id', 'buku_id'], 'required'],
            [['rak_id', 'buku_id'], 'integer'],
            [['rak_id'], 'exist', 'skipOnError' => true, 'targetClass' => RakBuku::className(), 'targetAttribute' => ['rak_id' => 'id']],
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
            'rak_id' => 'Rak ID',
            'buku_id' => 'Buku ID',
        ];
    }

    /**
     * Gets query for [[Rak]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRak()
    {
        return $this->hasOne(RakBuku::className(), ['id' => 'rak_id']);
    }

    /**
     * Gets query for [[Buku]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuku()
    {
        return $this->hasOne(DafBuku::className(), ['id' => 'buku_id']);
    }
}
