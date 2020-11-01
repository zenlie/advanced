<?php

use yii\helpers\Html;
use backend\models\DafBuku;
use yii\helpers\ArrayHelper; 

$dafBuku = DafBuku::find()->all();
$dafBuku = ArrayHelper::map($dafBuku,'buku_id','harga');

$this->title = 'Create Harga Buku';
$this->params['breadcrumbs'][] = ['label' => 'Harga Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafBuku' => $dafBuku 
    ]) ?>

</div>
