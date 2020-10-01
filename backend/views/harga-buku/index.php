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
        'filterModel' => true, //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 3
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'buku_id', //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'value' => 'buku.judul', //nama relasi.nama kolom getKategori.kolomtblnamaygdirelasiin
                'filter' => Html::textInput('buku_id',Yii::$app->request->get('buku_id'),['class'=>'form-control']) //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                    
            ],
            [
                'attribute' => 'harga', //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 1
                'filter' => Html::textInput('harga',Yii::$app->request->get('harga'),['class'=>'form-control']), //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 2                    
            ],
            // 'id',
            // 'buku_id',
            // 'harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
