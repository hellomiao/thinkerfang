<?php

namespace app\posts\controllers;

use app\user\components\AuthController;


/**
 * Default controller for the `posts` module
 */
class DefaultController extends AuthController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionPublish(){
        return $this->render('publish');
    }
}
