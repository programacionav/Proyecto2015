<?php

namespace app\modules\admcapacitaciones\controllers;

use Yii;
use app\models\Capacitaciones;
use app\modules\admcapacitaciones\models\CapacitacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\app\models;
use app\models\Capacitadores;
use app\models\app\models;
/**
 * CapacitacionesController implements the CRUD actions for Capacitaciones model.
 */
class CapacitacionesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Capacitaciones models.
     * @return mixed
     */
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function actionPrueba()
    {
    	return $this->render('prueba');
    }
    public function actionPorempresa($id)
    {
    	$capacitadores = new Capacitadores();
    	$capacitadores = Capacitadores::find()->where(['idEmpresaCapacitadora' => $id])->all();
    	
    	return $this->render('porempresa', ['data' => $capacitaciones]);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function actionIndex()
    {
        $searchModel = new CapacitacionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Capacitaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Capacitaciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCapacitacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Capacitaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCapacitacion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Capacitaciones model.
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
     * Finds the Capacitaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Capacitaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Capacitaciones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
