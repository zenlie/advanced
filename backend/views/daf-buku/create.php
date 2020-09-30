<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DafBuku */

$this->title = 'Create Daf Buku';
$this->params['breadcrumbs'][] = ['label' => 'Daf Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafKategori' => $dafKategori //dropdown list 6
    ]) ?>

</div>
