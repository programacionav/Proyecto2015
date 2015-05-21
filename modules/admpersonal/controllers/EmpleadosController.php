<?php

namespace app\modules\admpersonal\controllers;

use Yii;
use app\models\Empleados;
use app\modules\admpersonal\models\EmpleadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use app\models\Especialidades;
use app\models\Doctores;
use app\models\Enfermeros;
use app\models\Administrativos;

use app\modules\admpersonal\controllers\AdministrativosController;
use app\modules\admpersonal\controllers\DoctoresController;
use app\modules\admpersonal\controllers\EnfermerosController;

/*$Doctores = new DoctoresController();
$Administrativos = new AdministrativosController();
$Enfermeros = new EnfermerosController();*/


/**
 * EmpleadosController implements the CRUD actions for Empleados model.
 */
class EmpleadosController extends Controller
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
     * Lists all Empleados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'amdpersonal';
        $searchModel = new EmpleadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionInactivos()
    {
        $this->layout = 'amdpersonal';
        $searchModel = new EmpleadosSearch();
        $dataProvider = $searchModel->searchInactivos(Yii::$app->request->queryParams);
        
        return $this->render('inactivos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empleados model.
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

    /**
     * Creates a new Empleados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'amdpersonal';
        $model = new Empleados();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->tipoEmpleado == "doctor")
                {
                    $doc = new Doctores();
                    $doc->idDoctor = $model->idEmpleado;
                    $doc->idEspecialidad = $model->idEspecialidad;
                    $doc->Matricula = $model->matricula;
                    $doc->save();
                    return $this->redirect(['doctores/index']);
                }
            else if ($model->tipoEmpleado == "enfermero")
                {
                    $enf = new Enfermeros();
                    $enf->idEnfermero = $model->idEmpleado;
                    $enf->idEspecialidad = $model->idEspecialidad;
                    $enf->save();
                    return $this->redirect(['enfermeros/index']);
                }
            else
                {
                    $adm = new Administrativos();
                    $adm->idEmpleado = $model->idEmpleado;
                    $adm->idSector = $model->idSector;
                    $adm->save();
                    return $this->redirect(['administrativos/index']);
                }
            //return $this->redirect(['view', 'id' => $model->idEmpleado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empleados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'amdpersonal';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idEmpleado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Empleados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Enfermeros::findModel($id)->delete();
        $enfermero = $this->findModelEnfermeros($id);
        $doctor = $this->findModelDoctores($id);
        $administrativo = $this->findModelAdministrativos($id);
        
        if ($enfermero){$enfermero->delete();}
        if ($doctor){$doctor->delete();}
        if ($administrativo){$administrativo->delete();}
        
        $this->findModel($id)->delete();
        
        
        /*$Enfermeros->actionDelete($id);
        $Administrativos->actionDelete($id);*/
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Empleados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empleados::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModelEnfermeros($id)
    {
       $busqueda = Enfermeros::find()->where(["idEnfermero"=>$id])->one();
       if ($busqueda !== null)
            {
                return $busqueda;
            }
            else{ return false;}
    }
    
    protected function findModelAdministrativos($id)
    {
       $busqueda = Administrativos::find()->where(["idEmpleado"=>$id])->one();
       if ($busqueda !== null)
            {
                return $busqueda;
            }
            else{ return false;}
    }
    
    protected function findModelDoctores($id)
    {
       $busqueda = Doctores::find()->where(["idDoctor"=>$id])->one();
       if ($busqueda !== null)
            {
                return $busqueda;
            }
            else{ return false;}
    }
}
