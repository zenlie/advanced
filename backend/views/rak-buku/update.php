<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RakBuku */

$this->title = 'Update Rak Buku: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rak Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rak-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
