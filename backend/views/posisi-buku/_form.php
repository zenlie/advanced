<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PosisiBuku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posisi-buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rak_id')->textInput() ?>

    <?= $form->field($model, 'buku_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
