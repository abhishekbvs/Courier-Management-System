
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Staff Dash Board";
?>
<div class="courier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="container">
    <div class="row">
      <div class="col-">
          <img src="<?php echo Url::to('@web/images/delivered.jpeg');?>" style="width:100px ">
          <p>  <?= Html::a('Create Couriers', ['create'], ['class' => 'btn btn-success']) ?></p>
      </div>
      <div class="col">
        <img src="<?php echo Url::to('@web/images/pending.jpeg');?>" style="width:90px">
            <p>   <?= Html::a('Pending Couriers', ['pending'], ['class' => 'btn btn-success']) ?>  </p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <img src="<?php echo Url::to('@web/images/return.jpeg');?>" style="width:120px">
            <p>   <?= Html::a('Expired Couriers', ['expired'], ['class' => 'btn btn-success']) ?>  </p>
      </div>
      <div class="col">
        <img src="<?php echo Url::to('@web/images/returned.jpeg');?>" style="width:120px">
            <p>   <?= Html::a('Returned Couriers', ['returned'], ['class' => 'btn btn-success']) ?></p>
      </div>
    </div>
  </div>


</div>
