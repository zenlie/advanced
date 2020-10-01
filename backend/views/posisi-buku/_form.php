<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PosisiBuku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posisi-buku-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'rak_id')->dropDownList($rakBuku,['prompt'=>'-pilih rak-'])->label('no rak') ?> // dropdown list 7

    <?= $form->field($model, 'buku_id')->dropDownList($dafBuku,['prompt'=>'-pilih buku-'])->label('nama buku') ?> // dropdown list 7

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
