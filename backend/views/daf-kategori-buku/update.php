<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DafKategoriBuku */

$this->title = 'Update Daf Kategori Buku: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daf Kategori Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daf-kategori-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
