<?php

use yii\helpers\Html;

$this->title = 'Create Rak Buku';
$this->params['breadcrumbs'][] = ['label' => 'Rak Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rak-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
