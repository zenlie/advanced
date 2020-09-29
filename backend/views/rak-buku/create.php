<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RakBuku */

$this->title = 'Create Rak Buku';
$this->params['breadcrumbs'][] = ['label' => 'Rak Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rak-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
