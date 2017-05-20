<?php

namespace app\admin\controllers;

use app\admin\components\BaseController;
use app\admin\models\AdminGroup;
use app\admin\models\searchs\AdminSearch;
use app\admin\models\searchs\AdminSearchRecyle;
use app\base\lib\Utils;
use app\project\models\Project;
use app\project\models\ProjectDetail;
use Yii;
use app\admin\models\Admin;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use PHPExcel;
use PHPExcel_Writer_Excel2007;
use PHPExcel_Style_Border;
use PHPExcel_Style_Alignment;
use PHPExcel_IOFactory;

/**
 * UserController implements the CRUD actions for Admin model.
 */
class UserController extends BaseController
{

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $adminSearch = new AdminSearch();
        $dataProvider = $adminSearch->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'adminSearch'=>$adminSearch,
        ]);
    }


    public function actionRecycle()
    {
        $adminSearch = new AdminSearchRecyle();
        $dataProvider = $adminSearch->search(Yii::$app->request->get());

        return $this->render('recycle', [
            'dataProvider' => $dataProvider,
            'adminSearch'=>$adminSearch,
        ]);
    }

    /**
     * Displays a single Admin model.
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
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Admin();
        $model->scenario='create';
        $hash                         = substr(uniqid(rand()), -6);
        if ($model->load(Yii::$app->request->post())) {

            $ret=ActiveForm::validate($model);
            if(!$this->commit) {
                return $ret;
            }else{
                $model->save();
                $msg ="添加员工[$model->username]成功";
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
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post($model->formName());
        if(empty($post['password'])) {

            unset($post['password']);
        }
        $model->scenario='update';
        if ($model->load(Yii::$app->request->post())) {

            $ret=ActiveForm::validate($model);
            if(!empty($ret)) {
                return $ret;
            }else{
                if(!empty($post['password'])) {

                    $model->password=$model->hashPassword($post['password']);
                }
                $model->group_id = implode(',', $model->group_id);
                $model->save();
                $msg ="更新员工[$model->username]成功";
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
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->updateAll(['is_del'=>1],['id'=>$id]);
        $msg ="删除员工[$model->username]成功";
        Utils::adminLog('delete',$msg);
        return ['status'=>true,'message'=>$msg];
    }


    public function actionRestore($id)
    {
        $model = $this->findModel($id);
        $model->updateAll(['is_del'=>0],['id'=>$id]);
        $msg ="还原员工[$model->username]成功";
        Utils::adminLog('delete',$msg);
        return ['status'=>true,'message'=>$msg];
    }


    public function actionRedel()
    {
        $model =new Admin();
        $model->deleteAll(['is_del'=>1]);
        $msg ="删除全部回收站员工[$model->username]成功";
        Utils::adminLog('delete',$msg);
        return ['status'=>true,'message'=>$msg];
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionInfo()
    {
        $id = $this->uid;
        $model = $this->findModel($id);

        $post = Yii::$app->request->post($model->formName());
        if(empty($post['password'])) {

            unset($post['password']);
        }
        $model->scenario='update';
        if ($model->load(Yii::$app->request->post())) {

            $ret=ActiveForm::validate($model);
            if(!empty($ret)) {
                return $ret;
            }else{
                if(!empty($post['password'])) {

                    $model->password=$model->hashPassword($post['password']);
                }
                $model->save();
                $msg ="更新员工[$model->username]成功";
                Utils::adminLog('update',$msg);
                return ['status'=>true,'message'=>$msg];
            }
        } else {
            return $this->render('info', [
                'model' => $model,
            ]);
        }
    }


    public function actionProject($uid)
    {
        $model = $this->findModel($uid);
        $query = Project::find()->where(['is_del' => 0]);
        $query->innerJoinWith(['members']);
        $query->andWhere(['member.user_id' => $uid]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->defaultOrder = ['create_at' => SORT_DESC];
        return $this->render('project', [
            'dataProvider' => $dataProvider,'model'=>$model,'uid'=>$uid,

        ]);
    }


    public function actionExport()
    {
        set_time_limit (0);
        header("Content-type:application/vnd.ms-excel;charset=UTF-8");
        error_reporting(E_ALL);
        $uid = Yii::$app->request->post('uid');
        $id = Yii::$app->request->post('id');
        $model = $this->findModel($uid);
        $title=  $model->realname . '的项目列表';
        $query = Project::find()->where(['is_del' => 0]);
        $query->innerJoinWith(['members']);
        $query->where([Project::tableName().'.id'=>$id])->andWhere(['member.user_id' => $uid]);
        $list = $query->all();

        $objPHPExcel = new PHPExcel();
// Set document properties
        $objPHPExcel->getProperties()->setCreator("中准财务")
            ->setLastModifiedBy($this->uflag)
            ->setTitle($title)
            ->setSubject($title)
            ->setDescription($title)
            ->setKeywords($title)
            ->setCategory($title);
// Add some data
        $i = 1;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, '员工姓名')
            ->setCellValue('B'.$i, '项目名称')
            ->setCellValue('C'.$i, '项目类型')
            ->setCellValue('D'.$i, '项目经理')
            ->setCellValue('E'.$i, '合同号')
            ->setCellValue('F'.$i, '项目进场日期')
            ->setCellValue('G'.$i, '计划项目完成日期')
            ->setCellValue('H'.$i, '项目离场日期')
            ->setCellValue('I'.$i, '实际打印报告日期')
            ->setCellValue('J'.$i, '报告文号')
            ->setCellValue('K'.$i, '确认归档日期')
            ->setCellValue('L'.$i, '收款金额')
            ->setCellValue('M'.$i, '项目角色')
            ->setCellValue('N'.$i, '科目')
            ->setCellValue('O'.$i, '具体完成内容');

        $i=2;
        $j=1;
        foreach ($list as $k=>$v) {


            $detailList = ProjectDetail::find()->where(['project_id'=>$v->id,'user_id'=>$uid,'is_del'=>0])->all();

            foreach($detailList as $key=>$val){

                if($v!=null){
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i,$model->realname)
                        ->setCellValue('B'.$i,$v->name)
                        ->setCellValue('C'.$i,$v->type>0?$v->projectType->name:"")
                        ->setCellValue('D'.$i,$v->user->realname)
                        ->setCellValue('E'.$i,$v->contract_number)
                        ->setCellValue('F'.$i,date("Y-m-d",$v->in_at))
                        ->setCellValue('G'.$i,date("Y-m-d",$v->complete_at))
                        ->setCellValue('H'.$i,date("Y-m-d",$v->out_at))
                        ->setCellValue('I'.$i,$v->myStamp?date("Y-m-d",$v->myStamp->real_date):"")
                        ->setCellValue('J'.$i,$v->myStamp?$v->myStamp->report_number:"")
                        ->setCellValue('K'.$i,date("Y-m-d",$v->finish_at))
                        ->setCellValue('L'.$i,$v->amount)
                        ->setCellValue('M'.$i,$v->getType($uid))
                        ->setCellValue('N'.$i,$val->subject->name)
                        ->setCellValue('O'.$i,$val->category->name);
                    $v=null;
                }else{
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i,"")
                        ->setCellValue('B'.$i,"")
                        ->setCellValue('C'.$i,"")
                        ->setCellValue('D'.$i,"")
                        ->setCellValue('E'.$i,"")
                        ->setCellValue('F'.$i,"")
                        ->setCellValue('G'.$i,"")
                        ->setCellValue('H'.$i,"")
                        ->setCellValue('I'.$i,"")
                        ->setCellValue('J'.$i,"")
                        ->setCellValue('K'.$i,"")
                        ->setCellValue('L'.$i,"")
                        ->setCellValue('M'.$i,"")
                        ->setCellValue('N'.$i,$val->subject->name)
                        ->setCellValue('O'.$i,$val->category->name);
                }


                $i++;

            }
        }

// Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();//清除缓冲区,避免乱码
// Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }


}
