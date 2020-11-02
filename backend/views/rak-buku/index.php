<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Rak Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rak-buku-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Rak Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'no_rak',   
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
