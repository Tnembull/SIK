<?php

namespace app\controllers;

use Yii;
use app\models\Transaction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class TransaksiController extends Controller
{
    public function actionIndex()
    {
        $transactions = Transaction::find()->all();
        return $this->render('index', ['transactions' => $transactions]);
    }

    public function actionCreate()
    {
        $model = new Transaction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Transaction::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
