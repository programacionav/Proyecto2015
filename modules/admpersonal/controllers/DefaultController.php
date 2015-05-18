<?php

namespace app\modules\admpersonal\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->layout= 'amdpersonal.php';
        return $this->render('index');
    }
    
    public function actionMenu()
    {
        return $this->render('menuBarra');
    }
}
