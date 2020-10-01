<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HargaBuku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="harga-buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'buku_id')->dropDownList($dafBuku,['prompt'=>'-pilih buku-'])->label('Nama buku') ?> // dropdown list 7

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
