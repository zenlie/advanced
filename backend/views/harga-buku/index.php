<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\DafBuku;
use yii\helpers\ArrayHelper;

$dafBuku = DafBuku::find()->all();
$dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul');

$this->title = 'Harga Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-buku-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Harga Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            // [
            //     'attribute' => 'buku_id',
            //     'value' => 'buku.judul', 
            //     'filter' => Html::textInput($searchModel, 'buku_id', $dafBuku,
            //         ['class'=>'form-control']) 
                    
            // ],
            [
                'attribute' => 'buku_id', 
                'value' => 'buku.judul', 
                'filter' => Html::ActivedropDownList($searchModel, 'buku_id', $dafBuku,
                    ['class'=>'form-control','prompt'=>'- pilih buku -']
                )        
            ],
            [
                'attribute' => 'harga', 
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
