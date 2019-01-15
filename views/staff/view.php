<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Courier */

// $this->title = $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Couriers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="courier-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'parcel_id',
            'roll_no',
            'date_time',
            //'state_id',
            'service:ntext',
            //'otp',

        ],
    ]); ?>
    <?php
    echo Html::a('Deliverd', ['view', 'id' => $model->visitorpass_id], ['class' => 'btn btn-primary']);

     ?>
</div>
