<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PosisiBuku */

$this->title = 'Create Posisi Buku';
$this->params['breadcrumbs'][] = ['label' => 'Posisi Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafBuku' => $dafBuku, //dropdown list 6
        'rakBuku' => $rakBuku //dropdown list 6
    ]) ?>

</div>
