<?php

namespace app\controllers;

use Yii;
use app\models\Courier;
use app\models\CourierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Dummy;

/**
 * CourierController implements the CRUD actions for Courier model.
 */
class CourierController extends Controller
{
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
     * Lists all Courier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Courier model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $dummy = new Dummy();
        if($dummy->load(Yii::$app->request->post())){
          if(!strcmp($model->otp,$dummy->otp)){
            return $this->redirect(['delivered','id'=>$id]);
          }
          else{
            return $this->render('wrong_otp');
          }
        }

        return $this->render('view', [
            'model' => $model ,'dummy'=>$dummy,
        ]);
    }

    /**
     * Creates a new Courier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Courier();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Courier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Courier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Courier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Courier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

     public function actionDelivered($id){
       $model = $this->findModel($id);
       $model->state_id = 2;
       if($model->save()){
         return $this->redirect(['/staff/pending']);
       }
     }

     public function actionReturned($id){
       $model = $this->findModel($id);
       $model->state_id = 4;
       if($model->save()){
         return $this->redirect(['/staff/expired']);
       }
     }

    public function findModel($id)
    {
        if (($model = Courier::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
