<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\DafKategoriBuku;
use yii\helpers\ArrayHelper;

/* model for dropdown */
$dafKategori = DafKategoriBuku::find()->all();
$dafKategori = ArrayHelper::map($dafKategori,'id','nama');

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-buku-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'kategori_id', 
                'value' => 'kategori.nama', 
                'filter' => Html::ActivedropDownList($searchModel, 'kategori_id', $dafKategori,
                    ['class'=>'form-control','prompt'=>'- pilih kategori -']
                )        
            ],
            [
                'attribute' => 'judul',
            ],
            [
                'attribute' => 'pengarang', 
            ],
            [
                'attribute' => 'tahun_terbit', 
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
