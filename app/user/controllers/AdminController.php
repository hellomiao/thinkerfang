<?php

namespace app\user\controllers;


use app\admin\components\BaseController;
use app\user\models\searchs\UserSearch;
use app\base\lib\Utils;
use Yii;
use app\user\models\User;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

/**
 * AdminController implements the CRUD actions for User model.
 */
class AdminController extends BaseController
{


    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $userSearch = new UserSearch();
        $dataProvider = $userSearch->search(Yii::$app->request->get());
        $dataProvider->sort->defaultOrder = ['create_time' => SORT_DESC];
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'userSearch'=>$userSearch,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {

            $ret=ActiveForm::validate($model);
            if(!$this->commit) {
                return $ret;
            }else{
                $hash                         = substr(uniqid(rand()), -6);
                $model->hash=$hash;
                $model->create_time=time();
                $model->password=$model->hashPassword($model->password,$hash);
                $model->save();
                $msg ="添加会员用户[$model->username]成功";
                Utils::adminLog('create',$msg);
                return ['status'=>true,'message'=>$msg];
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();

        if(empty($post[$model->formName()]['password'])) {

            unset($post[$model->formName()]['password']);
        }

        if ($model->load($post)) {

            $ret=ActiveForm::validate($model);
            if(!empty($ret)) {
                return $ret;
            }else{

                if(!empty($post[$model->formName()]['password'])) {
                    $model->password = $model->hashPassword($model->password, $model->hash);
                }

                $model->save();
                $msg ="更新会员[$model->username]成功";
                Utils::adminLog('update',$msg);
                return ['status'=>true,'message'=>$msg];
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        $msg ="删除会员[$model->username]成功";
        Utils::adminLog('delete',$msg);
        return ['status'=>true];
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
