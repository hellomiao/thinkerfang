<?php
/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/5/17
 * Time: 上午11:14
 */

namespace app\home\controllers;


use app\cms\models\Category;
use app\cms\models\Cms;
use app\home\components\BaseController;
use yii\data\Pagination;

class NewsController extends BaseController
{

    public function actionIndex(){

        $cms = new Cms();
        $category_id=\Yii::$app->request->get('category_id');
        $where=['type'=>0];
        if($category_id){
            $where=['category_id'=>$category_id];
        }
        $data = $cms->find()->where($where)->orderBy('create_time DESC');
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => 12]);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

        if($category_id){
            $category_name = Category::findOne($category_id)->name;
        }


        return $this->render('index',['model' => $model,
            'pages' => $pages,'category_name'=>$category_name]);
    }


    public function actionView($id){

        $model = Cms::findOne($id);
        Cms::updateAllCounters(['view_num'=>1],['id'=>$id]);

        return $this->render('view',['model' => $model]);
    }


    public function actionStory($category_id){

        $cms = new Cms();
        $data = $cms->find()->where(['category_id'=>$category_id,'type'=>1])->orderBy('create_time DESC');
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => 12]);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        $category_name = Category::findOne($category_id)->name;
        $imgLimit = 4;
        $totalPage = ceil(count($model)/$imgLimit);
        return $this->render('story',['model' => $model,
            'pages' => $pages,'category_name'=>$category_name,'totalPage'=>$totalPage,'imgLimit'=>$imgLimit]);
    }


}