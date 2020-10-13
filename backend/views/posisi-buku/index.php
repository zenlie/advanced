<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 3
        'filterModel' => true, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'attribute' => 'rak_id', 
                //nama relasi.nama kolom getKategori.kolomtblnama
                'value' => 'rak.no_rak', 
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                'filter' => Html::dropDownList('rak_id',Yii::$app->request->get('
                    rak_id'),$rakBuku,['class'=>'form-control','prompt'=>'- pilih no rak -']) 
                    
            ],
            [
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'attribute' => 'buku_id',
                //nama relasi.nama kolom getKategori.kolomtblnama 
                'value' => 'buku.judul', 
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                'filter' => Html::textInput('buku_id',Yii::$app->request->get('buku_id'),['class'=>'form-control']) 
                    
            ],
        
            // 'id',
            // 'rak_id',
            // 'buku_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
