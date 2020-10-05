<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PosisiBuku */

$this->title = 'Create Posisi Buku';
$this->params['breadcrumbs'][] = ['label' => 'Posisi Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //dropdown list 6
        'dafBuku' => $dafBuku, 
        //dropdown list 6
        'rakBuku' => $rakBuku 
    ]) ?>

</div>
