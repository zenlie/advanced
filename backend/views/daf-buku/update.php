<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DafBuku */

$this->title = 'Update Daf Buku: ' . $model->buku_id;
$this->params['breadcrumbs'][] = ['label' => 'Daf Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->buku_id, 'url' => ['view', 'id' => $model->buku_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daf-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
