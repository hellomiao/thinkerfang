<?php

namespace app\admin\controllers;

use app\admin\components\BaseController;
use app\base\lib\Utils;
use Yii;
use app\admin\models\AdminAcl;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * AclController implements the CRUD actions for AdminAcl model.
 */
class AclController extends BaseController
{



    /**
     * Lists all AdminAcl models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model= new AdminAcl();
        //Yii::$app->getSession()->setFlash('error', '<b>Alert!</b> Danger alert preview. This alert is dismissable.');



        return $this->render('index', [
            'model' => $model,
        ]);

    }

    /**
     * Displays a single AdminAcl model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $model->toArray();
    }



    /**
     * Creates a new AdminAcl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AdminAcl();

        if ($model->load(Yii::$app->request->post())) {
            $ret=ActiveForm::validate($model);
            if(!empty($ret)) {
                return $ret;
            }else{
                $model->save();
                $msg ="添加权限[$model->name]成功";
                Utils::adminLog('create',$msg);
                return ['status'=>true,'message'=>$msg];
            }
        }
    }

    /**
     * Updates an existing AdminAcl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {

        $id=Yii::$app->request->post('id');

        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {
            $ret=ActiveForm::validate($model);
            if(!empty($ret)) {
                return $ret;
            }else{
                $model->save();
                $msg ="编辑权限[$model->name]成功";
                Utils::adminLog('create',$msg);
                return ['status'=>true,'message'=>$msg];
            }
        }
    }

    /**
     * Deletes an existing AdminAcl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $id=Yii::$app->request->post('id');
        $model =$this->findModel($id);
        $model->delete();
        $msg ="删除权限[$model->name]成功";
        Utils::adminLog('delete',$msg);
        return ['status'=>true];
    }

    /**
     * Finds the AdminAcl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdminAcl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminAcl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
