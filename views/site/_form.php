<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form ActiveForm */
?>
<div class="site-_form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model, ['header' => '']); ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'sum') ?>
        <?= $form->field($model, 'card_no') ?>
        <?= $form->field($model, 'exp_month') ?>
        <?= $form->field($model, 'exp_year') ?>
        <?= $form->field($model, 'cvv') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'state') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'zip_code') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_form -->
