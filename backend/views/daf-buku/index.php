<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daf Bukus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Daf Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'buku_id',
            'kategori_id',
            'judul',
            'pengarang',
            'tahun_terbit',

            ['class' => 'yii\grid\ActionColumn'],
        ], //gridview
    ]); ?>


</div>
