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
use app\models\Person;

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
      $model->date_time = date('Y-m-d H:i:s');
      $model->otp = rand(100000,999999);
      $model->state_id = self::PENDING;
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          $query = Person::find()->where(['roll_no'=>$model->roll_no])->all();
          $params = $query[0];
          $this->Mail($params,$model->otp);
          return $this->redirect(['pending']);
      }

      return $this->render('create', [
          'model' => $model,
      ]);
    }

  public function Mail($params,$otp){
      Yii::$app->mailer->compose()
        ->setFrom('no-reply@test.com')
        ->setTo($params->email)
        ->setSubject('Amrita Courier Service')
        ->setTextBody("Greetings $params->name \nThis is to inform you that, you have received a courier. Please collect it from the office. Your OTP for confirmation is $otp")
        ->send();

   return $this->render('index');
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

      date_default_timezone_set('Asia/Kolkata');
      $date = date_create(date('Y-m-d h:i:s'));
      date_sub($date,date_interval_create_from_date_string("7 days"));
      $model=Courier::find()->where(['<=','date_time', date_format($date,"Y-m-d H:i:s")])->andWhere(['state_id'=>1])->all();
       foreach($model as $key){
         $key->state_id = 3;
         $key->save();
       }
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
