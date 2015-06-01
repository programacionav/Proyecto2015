<?php

namespace app\modules\admcapacitaciones\controllers;

use Yii;
use app\models\EmpresasCapacitadoras;
use app\modules\admcapacitaciones\models\EmpresasCapacitadorasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Capacitaciones;
use app\models\Capacitadores;
use app\models\app\models;
use app\models\Usuarios;

/**
 * EmpresasCapacitadorasController implements the CRUD actions for EmpresasCapacitadoras model.
 */
class EmpresasCapacitadorasController extends Controller
{
    public function behaviors()
    {
        return
        [
			'verbs' =>
        	[
				'class' => VerbFilter::className(),
				'actions' =>
        		[
					'delete' => ['post'],
				],
			],
        	'access' =>
        	[
        		'class' => \yii\filters\AccessControl::className(),
        		'only' => ['index', 'create', 'update', 'delete', 'informacion', 'view'],
        		'rules' =>
        		[
        			[
        				'actions' => ['index', 'informacion', 'view'],
        				'allow' => true,
        				'roles' => ['@'],
        		],
        			[
        				'actions' => ['create', 'update', 'delete'],
        				'allow' => true,
        				'roles' => ['@'],
        				'matchCallback' =>
        				function ($rule, $action)
        				{
        					$valid_roles = [Usuarios::ROLE_ADMIN];
        					return Usuarios::roleInArray($valid_roles);
        				}
        			],
        		],
        	],
		];
	}

    /**
     * Lists all EmpresasCapacitadoras models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresasCapacitadorasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmpresasCapacitadoras model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$capacitadores = new Capacitadores();
    	$capacitadores = Capacitadores::find()->select(['idCapacitador'])->where(['idEmpresaCapacitadora' => $id]);
    	$capacitaciones = new Capacitaciones();
    	$cap = Capacitaciones::find()
    	->where(['idCapacitador' => $capacitadores])
    	->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
        	'cap' => $cap
        ]);
    }

    /**
     * Creates a new EmpresasCapacitadoras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmpresasCapacitadoras();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idEmpresa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmpresasCapacitadoras model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idEmpresa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmpresasCapacitadoras model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $modelo = $this->findModel($id);
        $modelo->EPActivo = 0;
        $modelo->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmpresasCapacitadoras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmpresasCapacitadoras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmpresasCapacitadoras::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
