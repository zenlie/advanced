<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Kategori Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-kategori-buku-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Kategori Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'nama',   
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
