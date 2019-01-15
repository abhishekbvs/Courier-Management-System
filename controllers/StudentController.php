<?php

namespace app\controllers;

use Yii;
use app\models\Courier;
use app\models\Person;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\data\ActiveDataProvider;

class StudentController extends Controller
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
     * Lists all NtroVisitorpass models.
     * @return mixed
     */
    public function actionIndex()
    {
      $roll_no = Person::find(['roll_no'])->where(['email'=> Yii::$app->user->identity->username])->all();
      $roll_no = $roll_no[0]->roll_no;
      $model =  new ActiveDataProvider([
        'query'=> Courier::find()->where(['roll_no'=>$roll_no]),
      ]);
      return $this->render('index',['model'=>$model]);
    }



}
