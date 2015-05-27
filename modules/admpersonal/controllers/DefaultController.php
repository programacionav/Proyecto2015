<?php

namespace app\modules\admpersonal\controllers;

//use yii\web\Controller;
//use app\models\Empleados;
//use app\modules\admpersonal\models\EmpleadosSearch;

use Yii;
use app\models\Empleados;
use app\modules\admpersonal\models\EmpleadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->layout= 'amdpersonal.php';
        return $this->redirect('admpersonal/empleados/index');
    }
   
}
