
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "DashBoard";
?>
<div class="courier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <img src="/"
        <?= Html::a('Create Couriers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Pending Couriers', ['pending'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Expired Couriers', ['expired'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Returned Couriers', ['returned'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
