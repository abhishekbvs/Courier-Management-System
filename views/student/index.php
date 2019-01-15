<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\State;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Student DashBoard";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $model,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'roll_no',
            'parcel_id',
            'date_time',
            'service:ntext',
            ['attribute' => 'state_id',
                'value' => function($model){
                            $state_name = State::find()->select(['state_name'])->where(['state_id' => $model->state_id])->one();
                            return $state_name ? $state_name->state_name:'None';
                       }
              ],
            //'otp',

            // ['class' => 'yii\grid\ActionColumn',
            // 'template' => '{view}' ],
        ],
    ]); ?>
</div>
