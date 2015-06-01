<?php

namespace app\modules\admcapacitaciones\controllers;

use Yii;
use app\models\Capacitadores;
use app\modules\admcapacitaciones\models\CapacitadoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Usuarios;

/**
 * CapacitadoresController implements the CRUD actions for Capacitadores model.
 */
class CapacitadoresController extends Controller
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
     * Lists all Capacitadores models.
     * @return mixed
     */
    public function actionPrueba()
    {
    	$capacitador = new CapacitadoresSearch();
    	$capacitador = Capacitadores::find()->all();
    	return $this->render('prueba', [
    			'searchModel' => $capacitador,
    	]);
    }
    public function actionIndex()
    {
        $searchModel = new CapacitadoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Capacitadores model.
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
     * Creates a new Capacitadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Capacitadores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCapacitador]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Capacitadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCapacitador]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Capacitadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $modelo = $this->findModel($id);
        $modelo->CapacitadoresActivo = 0;
        $modelo->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Capacitadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Capacitadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Capacitadores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
