<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="post-default-index">
    <h1>Create post</h1>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'picture')->fileInput(); ?>
        <?= $form->field($model, 'description'); ?>
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end(); ?>
</div>
