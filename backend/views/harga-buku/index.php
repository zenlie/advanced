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
        'filterModel' => true, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'buku_id',
                'value' => 'buku.judul', 
                'filter' => Html::textInput('buku_id',Yii::$app->request->get('buku_id'),['class'=>'form-control']) 
                    
            ],
            [
                'attribute' => 'harga', 
                'filter' => Html::textInput('harga',Yii::$app->request->get('harga'),['class'=>'form-control']),               
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
