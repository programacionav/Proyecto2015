<?php

namespace app\modules\admpacientes\controllers;

use Yii;
use app\models\PracticasMedicas;
use app\modules\admpacientes\PracticasMedicasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\Usuarios;
use yii\filters\AccessControl;




/**
 * PracticasMedicasController implements the CRUD actions for PracticasMedicas model.
 */
class PracticasMedicasController extends Controller
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
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        $valid_roles = [Usuarios::ROLE_ADMIN,Usuarios::ROLE_DOCTOR];
                        return Usuarios::roleInArray($valid_roles);}
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all PracticasMedicas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PracticasMedicasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PracticasMedicas model.
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

    /**
     * Creates a new PracticasMedicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout='mainPacientes.php';
        
        $model = new PracticasMedicas();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
              $model->file = UploadedFile::getInstance($model, 'file');
             if ($model->file && $model->validate()) {
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                }
            return $this->redirect(['view', 'id' => $model->idPractica]);
        } else {
            return $this->render('create', [
                'model' => $model,
              
            ]);
        }

    }

    /**
     * Updates an existing PracticasMedicas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPractica]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PracticasMedicas model.
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
     * Finds the PracticasMedicas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PracticasMedicas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PracticasMedicas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
