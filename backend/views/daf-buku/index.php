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
        'filterModel' => true, //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 3
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'kategori_id', //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'value' => 'kategori.nama', //nama relasi.nama kolom getKategori.kolomtblnama
                'filter' => Html::textInput('kategori_id',Yii::$app->request->get('kategori_id'),['class'=>'form-control']) //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                    
            ],
            [
                'attribute' => 'judul', //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 1
                'filter' => Html::textInput('judul',Yii::$app->request->get('judul'),['class'=>'form-control']), //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 2                    
            ],
            'pengarang',
            'tahun_terbit',

            ['class' => 'yii\grid\ActionColumn'],
        ], //gridview
    ]); ?>


</div>
