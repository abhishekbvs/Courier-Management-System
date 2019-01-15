<?php

namespace app\controllers;

use Yii;
use app\models\Courier;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

class AdminController extends Controller
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
      return $this->render('index');
    }



}
