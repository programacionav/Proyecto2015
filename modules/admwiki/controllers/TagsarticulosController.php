<?php

namespace app\modules\admwiki\controllers;

use Yii;
use app\models\Tagsarticulos;
use app\modules\admwiki\models\TagsarticulosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TagsarticulosController implements the CRUD actions for Tagsarticulos model.
 */
class TagsarticulosController extends Controller
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
     * Lists all Tagsarticulos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagsarticulosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tagsarticulos model.
     * @param integer $idArticulo
     * @param integer $idTag
     * @return mixed
     */
    public function actionView($idArticulo, $idTag)
    {
        return $this->render('view', [
            'model' => $this->findModel($idArticulo, $idTag),
        ]);
    }

    /**
     * Creates a new Tagsarticulos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tagsarticulos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idArticulo' => $model->idArticulo, 'idTag' => $model->idTag]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tagsarticulos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idArticulo
     * @param integer $idTag
     * @return mixed
     */
    public function actionUpdate($idArticulo, $idTag)
    {
        $model = $this->findModel($idArticulo, $idTag);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idArticulo' => $model->idArticulo, 'idTag' => $model->idTag]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tagsarticulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idArticulo
     * @param integer $idTag
     * @return mixed
     */
    public function actionDelete($idArticulo, $idTag)
    {
        $this->findModel($idArticulo, $idTag)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tagsarticulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idArticulo
     * @param integer $idTag
     * @return Tagsarticulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idArticulo, $idTag)
    {
        if (($model = Tagsarticulos::findOne(['idArticulo' => $idArticulo, 'idTag' => $idTag])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
