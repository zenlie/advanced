<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PosisiBuku */

$this->title = 'Update Posisi Buku: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posisi Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posisi-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
