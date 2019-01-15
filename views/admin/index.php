
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
        <?= Html::a('Create Person', ['/person/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Create User', ['/user/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('View Persons', ['/person/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('View Users', ['/user/index'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
