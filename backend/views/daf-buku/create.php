<?php

use yii\helpers\Html;
use backend\models\DafKategoriBuku;
use yii\helpers\ArrayHelper; 

$dafKategoriBuku = DafKategoriBuku::find()->all();
$dafKategoriBuku = ArrayHelper::map($dafKategoriBuku,'id','nama');

$this->title = 'Create Buku';
$this->params['breadcrumbs'][] = ['label' => 'Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafKategoriBuku' => $dafKategoriBuku 
    ]) ?>

</div>
