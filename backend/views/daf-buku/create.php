<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DafBuku */

$this->title = 'Create Buku';
$this->params['breadcrumbs'][] = ['label' => 'Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //dropdown list 6
        'dafKategori' => $dafKategori 
    ]) ?>

</div>
