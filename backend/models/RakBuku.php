<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rak_buku".
 *
 * @property int $id
 * @property int $no_rak
 *
 * @property PosisiBuku[] $posisiBukus
 */
class RakBuku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rak_buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rak'], 'required'],
            [['no_rak'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_rak' => 'No Rak',
        ];
    }

    /**
     * Gets query for [[PosisiBukus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosisiBukus()
    {
        return $this->hasMany(PosisiBuku::className(), ['rak_id' => 'id']);
    }
}
