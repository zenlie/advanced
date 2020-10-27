<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\DafBuku;
use backend\models\RakBuku;
use yii\helpers\ArrayHelper;

/* model for dropdown */
$rakBuku = RakBuku::find()->all(); 
$rakBuku = ArrayHelper::map($rakBuku,'id','no_rak'); 

$dafBuku = DafBuku::find()->all(); 
$dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul');
// echo "<pre>";
// var_dump($dafBuku); die;

/* start view index */
$this->title = 'Posisi Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-buku-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Posisi Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'rak_id', 
                'value' => 'rak.no_rak', 
                'filter' => Html::ActivedropDownList($searchModel, 'rak_id', $rakBuku,
                    ['class'=>'form-control','prompt'=>'- pilih no rak -']
                )   
            ],
            [
                'attribute' => 'buku_id',
                'value' => 'buku.judul', 
                'filter' => Html::ActivedropDownList($searchModel, 'buku_id', $dafBuku,
                    ['class'=>'form-control','prompt'=>'- pilih Buku -']
                )          
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>