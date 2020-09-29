<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Harga Bukus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Harga Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'buku_id',
            'harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
