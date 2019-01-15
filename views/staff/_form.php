<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Courier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parcel_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'roll_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
