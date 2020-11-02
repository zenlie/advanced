<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="rak-buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rak')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
