<?php

namespace app\modules\admambulancias\controllers;

use Yii;
use app\models\Ambulancias;
use app\modules\admambulancias\models\AmbulanciasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Empleados;
use yii\helpers\ArrayHelper;
use app\models\Segurosambulancias;


//Para buscar


//Paginacion

//Para elimnar datos


/**
 * AmbulanciasController implements the CRUD actions for Ambulancias model.
 */
class AmbulanciasController extends Controller
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
     * Lists all Ambulancias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AmbulanciasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
public function actionInformacion($id)
    {
        //$objAseguradora=new Segurosambulancias($id);
        $aux= $this->findModel($id);
        
        $tabla=new Ambulancias();
        $model=$tabla->find()->where(['Patente'=>$id])->all();
        
        $tablaEmpleado=new \app\models\Empleados();
        $numEmpleado=$aux->idEmpleado;
        $emp=$tablaEmpleado->find()->where(['idEmpleado'=>$numEmpleado])->all();
        
        $tablaRevisiones=new \app\models\Revisionestecnicas();
        $re=$tablaRevisiones->find()->where(['Patente'=>$id])->all();
        
        $tablaAseguradora=new Segurosambulancias();
        $se=$tablaAseguradora->find()->where(['Patente'=>$id])->all();
         
        return $this->render('informacion', [
           'model' =>$model, 
            'empleadoAcargo'=>$emp,
            'revisiones'=>$re,
            'aseguradora'=>$se,
            
        ]);
    }

    /**
     * Displays a single Ambulancias model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    

    /**
     * Creates a new Ambulancias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $objEmpleado=new Empleados();
    //$criteria->select = 'CONCAT(Nombre, Apellido) AS fullname';
    $sql = "SELECT idEmpleado, CONCAT(Nombre,' ' ,Apellido) as nomApe FROM Empleados";
    //$model = User::findBySql($sql)->all(); 
    $otro=$objEmpleado::findBySql($sql)->asArray()->all();
    $nombreApellido=ArrayHelper::map($otro, 'idEmpleado', 'nomApe');

        
        $model = new Ambulancias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Patente]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'arreDatos'=>$nombreApellido,
            ]);
        }
    }


    /**
     * Updates an existing Ambulancias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $objEmpleado=new Empleados();
    //$criteria->select = 'CONCAT(Nombre, Apellido) AS fullname';
    $sql = "SELECT idEmpleado, CONCAT(Nombre,' ' ,Apellido)as nomApe FROM Empleados";
    //$model = User::findBySql($sql)->all(); 
    $otro=$objEmpleado::findBySql($sql)->asArray()->all();
    $nombreApellido=ArrayHelper::map($otro, 'idEmpleado', 'nomApe');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Patente]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'arreDatos'=>$nombreApellido,
            ]);
        }
    }

    /**
     * Deletes an existing Ambulancias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    /*
     * $resultado = $this->findModeldetags($id);
        
        for($i=0;$i<count($resultado);$i++) {
                    $elTag = $resultado[$i];
                       $elTag->delete();            
        
        }
        
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
     */
    protected function findModeldetags($id)
    {
        $busqueda = Segurosambulancias::find() ->where(['Patente' => $id]) ->all();
        if ($busqueda !== null) {
            return $busqueda;
        } else {
           return false;
        }
    }
    protected function findEliminarRevisiones($id)
    {
        $busqueda = \app\models\Revisionestecnicas::find() ->where(['Patente' => $id]) ->all();
        if ($busqueda !== null) {
            return $busqueda;
        } else {
           return false;
        }
    }
    public function actionDelete($id)
    {
        
        $resultado = $this->findModeldetags($id);
        for($i=0;$i<count($resultado);$i++) {
                    $elTag = $resultado[$i];
                       $elTag->delete();            
        
        }
        $resultado = $this->findEliminarRevisiones($id);
        
        for($i=0;$i<count($resultado);$i++) {
                    $elTag = $resultado[$i];
                       $elTag->delete();            
        
        }
         
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ambulancias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Ambulancias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ambulancias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function getApartamentos() {
        $query = app\models\Empleados::findBySql('select CONCAT(Nombre, \' \', Apellido) as numero_completo') ;
        return ArrayHelper::map($query->asArray()->all(),'id','numero_completo'); 
   }
}
