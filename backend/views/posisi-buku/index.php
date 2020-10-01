<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posisi Bukus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Posisi Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => true, //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 3
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'rak_id', //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'value' => 'rak.no_rak', //nama relasi.nama kolom getKategori.kolomtblnama
                'filter' => Html::textInput('rak_id',Yii::$app->request->get('rak_id'),['class'=>'form-control']) //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                    
            ],
            [
                'attribute' => 'buku_id', //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'value' => 'buku.judul', //nama relasi.nama kolom getKategori.kolomtblnama
                'filter' => Html::textInput('buku_id',Yii::$app->request->get('buku_id'),['class'=>'form-control']) //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                    
            ],
        
            // 'id',
            // 'rak_id',
            // 'buku_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
