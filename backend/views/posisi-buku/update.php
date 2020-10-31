<?php

use yii\helpers\Html;
use backend\models\DafBuku;
use backend\models\RakBuku;
use yii\helpers\ArrayHelper; 

$dafBuku = DafBuku::find()->all(); 
$rakBuku = RakBuku::find()->all(); 
$dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul');
$rakBuku = ArrayHelper::map($rakBuku,'id','no_rak'); 

$this->title = 'Update Posisi Buku: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posisi Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posisi-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafBuku' => $dafBuku, 
        'rakBuku' => $rakBuku 
    ]) ?>

</div>
