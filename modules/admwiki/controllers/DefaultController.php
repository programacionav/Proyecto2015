<?php

//Esto es una prueba de GitHub

namespace app\modules\admwiki\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
