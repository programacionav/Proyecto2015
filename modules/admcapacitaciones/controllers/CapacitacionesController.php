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
use app\models\Doctores;
use app\models\CapacitacionesDoctores;
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
    /* BORRAR TODAS LAS RELACIONES NO ES LA SOLUCION
    public function actionRelacion($id)
    {
    	$busqueda = CapacitacionesDoctores::find() ->where(['idCapacitacion' => $id]) ->all();
    	if ($busqueda !== null) {
    		return $busqueda;
    	} else {
    		return false;
    	}
    }
    */
    public function actionPorfecha()
    {
        $model = new CapacitacionesSearch();
 
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // datos validos recibidos
            return $this->render('index', ['model' => $model]);
        } else {
            // o se ha solicitado la pagina inicial o bien hay un error de validacion
            return $this->render('filtroporfecha', ['model' => $model]);
        }
    }
    public function actionDoctores()
    {
    	$dataProvider = new Doctores();
    	$dataProvider = $dataProvider->find()->all();
    	
    	return $this->render('doctores', [
    			'dataProvider' => $dataProvider,
    	]);
    }
    /**
     * Lists all Capacitaciones models.
     * @return mixed
     */
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
    	/*
    	 * $resultado = $this->actionRelacion($id);
    	for($i=0;$i<count($resultado);$i++)
    	{
    		$relacion = $resultado[$i];
    		$relacion->delete();
    	}**/
    	/*LO QUE SIGUE ES IGUAL QUE LO DE ARRIBA SI USAR LA FUNCION actionBorrar()
    	$relacion = new CapacitacionesDoctores();
    	$array = $relacion->find()->where(['idDoctor' => $id])->all();
    	for($i=0;$i<count($array);$i++)
    	{
    		$r = $array[$i];
    		$r->delete();
    	}*/
    	
        $modelo = $this->findModel($id);
        $modelo->CapacitacionesActivo = 0;
        $modelo->save();

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
