<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourierSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courier-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parcel_id') ?>

    <?= $form->field($model, 'roll_no') ?>

    <?= $form->field($model, 'date_time') ?>

    <?= $form->field($model, 'state_id') ?>

    <?php // echo $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'otp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
