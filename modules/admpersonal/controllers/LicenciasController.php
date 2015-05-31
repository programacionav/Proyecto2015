<?php

namespace app\modules\admpersonal\controllers;

use Yii;
use app\models\Licencias;
use app\modules\admpersonal\models\LicenciasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Usuarios;
use yii\filters\AccessControl;

/**
 * LicenciasController implements the CRUD actions for Licencias model.
 */
class LicenciasController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create','update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create','update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = [Usuarios::ROLE_ADMIN];
                        return Usuarios::roleInArray($valid_roles);}
                    ],
                ],
            ],
        ];
    }
    

    /**
     * Lists all Licencias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'amdpersonal';
        $searchModel = new LicenciasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    

    /**
     * Displays a single Licencias model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'amdpersonal';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionHistorial()
    {
       $this->layout = 'amdpersonal';
        $searchModel = new LicenciasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('historial', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPendientes()
    {
       $this->layout = 'amdpersonal';
        $searchModel = new LicenciasSearch();
        $dataProvider = $searchModel->searchPendientes(Yii::$app->request->queryParams);

        return $this->render('pendientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Licencias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'amdpersonal';
        $model = new Licencias();
        
        if (isset($_GET['idEmpleado']))
        {$idEmpleado = $_GET['idEmpleado'];}
        else
        {$idEmpleado = "";}
        
        if (isset($_GET['idEstado']))
        {$idEstado = $_GET['idEstado'];}
        else
        {$idEstado = "3";}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['pendientes', 'id' => $model->idLicencia]);
        } else {
            return $this->render('create', [
                'model' => $model, 'idEmpleado' => $idEmpleado, 'idEstado' => $idEstado
            ]);
        }
    }

    /**
     * Updates an existing Licencias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'amdpersonal';
        $model = $this->findModel($id);
        
        if (isset($_GET['idEmpleado']))
        {$idEmpleado = $_GET['idEmpleado'];}
        else
        {$idEmpleado = "";}
        
        if (isset($_GET['idEstado']))
        {$idEstado = $_GET['idEstado'];}
        else
        {$idEstado = "3";}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['pendientes', 'id' => $model->idLicencia]);
        } else {
            return $this->render('update', [
                'model' => $model, 'idEmpleado' => $model->idEmpleado, 'idEstado' => $idEstado
            ]);
        }
    }

    /**
     * Deletes an existing Licencias model.
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
     * Finds the Licencias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Licencias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Licencias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
