<?php

use yii\helpers\Html;
use backend\models\DafKategoriBuku;
use yii\helpers\ArrayHelper;

$dafKategoriBuku = DafKategoriBuku::find()->all(); 
$dafKategoriBuku = ArrayHelper::map($dafKategoriBuku,'id','nama');

$this->title = 'Update Buku: ' . $model->buku_id;
$this->params['breadcrumbs'][] = ['label' => 'Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->buku_id, 'url' => ['view', 'id' => $model->buku_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daf-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafKategoriBuku' => $dafKategoriBuku 
    ]) ?>

</div>
