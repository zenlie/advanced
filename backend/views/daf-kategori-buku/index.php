<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daf Kategori Bukus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-kategori-buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Daf Kategori Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 3
        'filterModel' => true, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 2
                'attribute' => 'id',
                //nama relasi.nama kolom getKategori.kolomtblnama 
                'value' => 'nama', 
                //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 1
                'filter' => Html::textInput('id',Yii::$app->request->get('id'),['class'=>'form-control']) 
                    
            ],
            
            // 'id',
            // 'nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
