<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 3
        'filterModel' => true, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'attribute' => 'kategori_id',
                //nama relasi.nama kolom getKategori.kolomtblnama 
                'value' => 'kategori.nama', 
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                'filter' => Html::textInput('kategori_id',Yii::$app->request->get('kategori_id'),['class'=>'form-control']) 
                    
            ],
            [
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 1
                'attribute' => 'judul', 
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 2                    
                'filter' => Html::textInput('judul',Yii::$app->request->get('judul'),['class'=>'form-control']), 
            ],
            [
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 1
                'attribute' => 'pengarang', 
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 2
                'filter' => Html::textInput('pengarang',Yii::$app->request->get('pengarang'),['class'=>'form-control']),                     
            ],
            [
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 1
                'attribute' => 'tahun_terbit', 
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 2
                'filter' => Html::textInput('tahun_terbit',Yii::$app->request->get('tahun_terbit'),['class'=>'form-control']),                     
            ],
            // 'pengarang',        <= ini jika tanpa filter
            // 'tahun_terbit',
            
            ['class' => 'yii\grid\ActionColumn'],
        ], //gridview
    ]); ?>


</div>
