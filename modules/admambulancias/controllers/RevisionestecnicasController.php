<?php

namespace app\modules\admambulancias\controllers;

use Yii;
use app\models\Revisionestecnicas;
use app\modules\admambulancias\models\RevisionestecnicasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RevisionestecnicasController implements the CRUD actions for Revisionestecnicas model.
 */

class RevisionestecnicasController extends Controller
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
     * Lists all Revisionestecnicas models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        
        $searchModel = new RevisionestecnicasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2()
    {
        
        
        $searchModel = new RevisionestecnicasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /*
    public function actionIndex()
    {
        $searchModel = new RevisionestecnicasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     * 
     */

    /**
     * Displays a single Revisionestecnicas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function dias($data) {
                    $tempId = $data["idRevision"];

                    date_default_timezone_set('America/Argentina/Buenos_Aires');

                    $fechaVigencia = $data['FechaVigencia'];
                    //Fecha de vigencia seccionada
                    $diaVigencia = $fechaVigencia[8] . $fechaVigencia[9];
                    $mesVigencia = $fechaVigencia[5] . $fechaVigencia[6];
                    $anioVigencia = $fechaVigencia[0] . $fechaVigencia[1] . $fechaVigencia[2] . $fechaVigencia[3];

                    $datevigencia = date_create($anioVigencia . '-' . $mesVigencia . '-' . $diaVigencia);
                    $dateactual = new DateTime("now");
                    $diferenciaDias = (date_diff($dateactual, $datevigencia)->format('%R%a'))* -1 *-1;
                    
                    if ($diferenciaDias<=15) {//Modificar URL para enviar mail
                        if ($diferenciaDias < 0) {
                            $sale = Html::a('Dar aviso!<br>Vencio hace ' . ($diferenciaDias* -1) . ' dias', ['aviso', 'id' => $tempId], ['class' => 'btn btn-danger', 'onclick' => 'actionAviso(' . $tempId . ')']);
                        } else {
                            $sale = Html::a('Dar aviso!<br>Aun quedan ' . $diferenciaDias . ' dias', ['aviso', 'id' => $tempId], ['class' => 'btn btn-warning', 'onclick' => 'actionAviso(' . $tempId . ')']);
                        }
                    } else {
                        $sale = Html::a('Vigente<br>Aun quedan ' . $diferenciaDias . ' dias', ['aviso', 'id' => $tempId], ['class' => 'btn btn-primary disabled']);
                    }
                    return $sale;
                }
                
    public function actionAviso($id)
    {
         $aux= $this->findModel($id);
        return $this->render('aviso', [
           'model' =>$aux, 'emailEmpleado'=>$aux->patente->idEmpleado0->Email
        ]);
    }
    

    /**
     * Creates a new Revisionestecnicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Revisionestecnicas();

        if ($model->load(Yii::$app->request->post())) {
            $fechaAux= date_create($model->FechaCarga);
            $model->FechaCarga=  date_format($fechaAux,'Y-m-d');
            $fechaAux= date_create($model->FechaVigencia);
            $model->FechaVigencia=  date_format($fechaAux,'Y-m-d');
            if($model->save()){
            return $this->redirect(['view', 'id' => $model->idRevision]);
            }
            
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Revisionestecnicas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $fechaAux= date_create($model->FechaCarga);
            $model->FechaCarga=  date_format($fechaAux,'Y-m-d');
            $fechaAux= date_create($model->FechaVigencia);
            $model->FechaVigencia=  date_format($fechaAux,'Y-m-d');
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->idRevision]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Revisionestecnicas model.
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
     * Finds the Revisionestecnicas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Revisionestecnicas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Revisionestecnicas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
