<?php

namespace app\admin\controllers;

use app\admin\components\BaseController;
use Yii;
use app\admin\models\AdminLogger;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoggerController implements the CRUD actions for AdminLogger model.
 */
class LoggerController extends BaseController
{


    /**
     * Lists all AdminLogger models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AdminLogger::find(),
        ]);
        $dataProvider->sort->defaultOrder=['create_time'=>SORT_DESC];
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }





    /**
     * Deletes an existing AdminLogger model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AdminLogger model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdminLogger the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminLogger::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
