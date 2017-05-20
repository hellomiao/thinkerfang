<?php

namespace app\home\controllers;

use app\cms\models\Slide;
use app\home\components\BaseController;
use app\posts\models\Posts;
use yii\data\Pagination;

/**
 * Default controller for the `home` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {


        $posts_model = new Posts();
        $category_id = \Yii::$app->request->get('category_id');
        $where = ['status' => 0];
        if ($category_id) {
            $where = ['category_id' => $category_id];
        }
        $data = $posts_model->find()->where($where)->orderBy('create_time DESC');
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 12]);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

//        if($category_id){
//            $category_name = Category::findOne($category_id)->name;
//        }


        return $this->render('index', ['model' => $model]);
    }



}
