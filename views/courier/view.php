<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Courier */

$this->title = $model->roll_no;
$this->params['breadcrumbs'][] = ['label' => 'Couriers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="courier-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'parcel_id',
            'roll_no',
            'date_time',
            //'state_id',
            'service:ntext',
            //'otp',
        ],
    ]) ?>
    <?php
    if($model->state_id==1){
        $form = ActiveForm::begin();
        echo $form->field($dummy, 'otp')->textInput(['maxlenght'=>'true']);
        echo Html::submitButton('Delivered', ['class' => 'btn btn-primary']);
        ActiveForm::end();
      }
      else if ($model->state_id==3){
        echo Html::a('Returned', ['returned', 'id' => $model->id], ['class' => 'btn btn-primary']);
      }

     ?>


</div>
