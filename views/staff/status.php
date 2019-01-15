<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $state;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'roll_no',
            'parcel_id',
            'date_time',
            //'state_id',
            'service:ntext',
            //'otp',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}' ],
        ],
    ]); ?>
</div>
