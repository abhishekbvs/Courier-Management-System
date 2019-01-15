<?php

namespace app\controllers;

use Yii;
use app\models\Courier;
use app\models\CourierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\controllers\CourierController;
use yii\data\ActiveDataProvider;

class StaffController extends Controller
{
  const PENDING = 1;
  const DELIVERED = 2;
  const EXPIRED = 3;
  const RETURNED = 4;
  /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all NtroVisitorpass models.
     * @return mixed
     */
    public function actionIndex()
    {
      return $this->render('index');
    }

    public function actionCreate(){
      $model = new Courier();
      date_default_timezone_set('Asia/Kolkata');
      $model->date_time = date('d/m/Y h:i:s a');
      $model->otp = 5151653;
      $model->state_id = self::PENDING;
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['pending']);
      }

      return $this->render('create', [
          'model' => $model,
      ]);
    }

    public function actionPending(){
      $searchModel = new CourierSearch(['state_id'=>self::PENDING]);
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('status', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          'state'=> "Pending Couriers"
      ]);
    }

    public function actionDelivered(){
      $searchModel = new CourierSearch(['state_id'=>self::DELIVERED]);
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('status', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          'state'=> "Delivered Couriers"
      ]);
    }

    public function actionExpired(){
      $searchModel = new CourierSearch(['state_id'=>self::EXPIRED]);
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      return $this->render('status', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          'state'=> "Expired Couriers"
      ]);
    }

    public function actionReturned(){
      $searchModel = new CourierSearch(['state_id'=>self::RETURNED]);
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      return $this->render('status', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          'state'=> "Returned Couriers"
      ]);
    }

    public function actionView($id)
    {
        return $this->redirect(['/courier/view','id' => $id]);
    }

}
