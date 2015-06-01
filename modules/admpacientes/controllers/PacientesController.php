<?php

namespace app\modules\admpacientes\controllers;

use Yii;
use app\models\Pacientes;
use app\modules\admpacientes\PacientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admpacientes\ConsultasSearch;
use app\models\FormSearch;
use yii\helpers\Html;
use app\models\Consultas;
use app\models\LoginForm;
use app\models\Usuarios;
use yii\filters\AccessControl;

/**
 * PacientesController implements the CRUD actions for Pacientes model.
 */
class PacientesController extends Controller
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
                'class' => AccessControl::className(),
                'only' => ['create','update','ficha','delete'],
                'rules' => [
                    [
                        'actions' => ['create','update','ficha'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = [Usuarios::ROLE_DOCTOR];
                        return Usuarios::roleInArray($valid_roles);}
                    ],
                ],
                'rules' => [
                    [
                        'actions' => ['create','update','ficha','delete'],
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
     * Lists all Pacientes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PacientesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout='mainPacientes.php';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pacientes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout='mainPacientes.php';
        return $this->render('view', [
            'model' => $this->findModel($id),
           
        ]);
    }
    
    public function actionFicha($id)
    {
        $this->layout='mainPacientes.php';
        
         $searchModel = new \app\modules\admpacientes\PracticasMedicasSearch();
         $searchModel->idPaciente=$id;
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         
         $searchModel2 = new ConsultasSearch();
         $searchModel2->idPaciente=$id;
         $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
         
            return $this->render('ficha', [
               
               'id' => $id,
               'searchModel'=>$searchModel,
               'dataProvider'=>$dataProvider,
               'searchModel2'=>$searchModel2,
               'dataProvider2'=>$dataProvider2,
                'model'=>$this->findModel($id),
             ]);
}


    /**
     * Creates a new Pacientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout='mainPacientes.php';
        
        $model = new Pacientes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPaciente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pacientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout='mainPacientes.php';
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPaciente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pacientes model.
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
     * Finds the Pacientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pacientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pacientes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
      
}
