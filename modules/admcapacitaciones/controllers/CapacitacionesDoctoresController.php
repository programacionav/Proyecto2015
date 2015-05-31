<?php

namespace app\modules\admcapacitaciones\controllers;

use Yii;
use app\models\CapacitacionesDoctores;
use app\modules\admcapacitaciones\models\CapacitacionesDoctoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * CapacitacionesDoctoresController implements the CRUD actions for CapacitacionesDoctores model.
 */
class CapacitacionesDoctoresController extends Controller
{
    public function behaviors()
    {
        return [
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
     * Lists all CapacitacionesDoctores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CapacitacionesDoctoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single CapacitacionesDoctores model.
     * @param integer $id
     * @return mixed
     */
    public function actionPordoctor($id, $nombre, $apellido)
    {
    	$dataProvider = new ActiveDataProvider([
    			'query' => CapacitacionesDoctores::find()->where(['idDoctor' => $id]),
    			'pagination' => [
    					'pageSize' => 20,
    			],
    	]);
    	return $this->render('pordoctor', ['dataProvider' => $dataProvider, 'nombre' => $nombre, 'apellido' => $apellido]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new CapacitacionesDoctores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CapacitacionesDoctores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCD]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CapacitacionesDoctores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCD]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CapacitacionesDoctores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $modelo = $this->findModel($id);
        $modelo->CDActivo = 0;
        $modelo->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CapacitacionesDoctores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CapacitacionesDoctores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CapacitacionesDoctores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
