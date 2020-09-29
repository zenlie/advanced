<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HargaBuku */

$this->title = 'Create Harga Buku';
$this->params['breadcrumbs'][] = ['label' => 'Harga Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
