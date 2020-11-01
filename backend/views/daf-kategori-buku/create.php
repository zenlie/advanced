<?php

use yii\helpers\Html;

$this->title = 'Create Kategori Buku';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-kategori-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
