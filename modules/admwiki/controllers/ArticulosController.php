<?php

namespace app\modules\admwiki\controllers;

use Yii;
use app\models\Articulos;
use app\modules\admwiki\models\ArticulosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//AGREGADOS PARA CREAR TABLA TAGSARTICULOS
use app\models\Tagsarticulos;
use app\models\Tags;
use yii\base\Action;
use app\models\app\models;

//MPDF (Ver articulos como PDF)
use kartik\mpdf\Pdf;
use yii\db\mssql\TableSchema;

//USUARIOS (Implementacion control usuarios)
use app\models\Usuarios;
use yii\filters\AccessControl;


/**
 * ArticulosController implements the CRUD actions for Articulos model.
 */


class ArticulosController extends Controller
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
    					'only' => ['create','update','delete','verhistorico'],
    					'rules' => [
    							[
    									'actions' => ['create','update','delete'],
    									'allow' => true,
    									'roles' => ['@'],
    									'matchCallback' => function ($rule, $action) {
    										$valid_roles = [Usuarios::ROLE_DOCTOR,];
    										return Usuarios::roleInArray($valid_roles);
    									}
    							],
    							[
    									'actions' => ['verhistorico'],
    									'allow' => true,
    									'roles' => ['@'],
    									'matchCallback' => function ($rule, $action) {
    										$valid_roles = [Usuarios::ROLE_ENFER,
    														Usuarios::ROLE_DOCTOR
    										];
    										return Usuarios::roleInArray($valid_roles);
    									}
    							],
    							],
    							],						
         ];
    }

    /**
     * Lists all Articulos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticulosSearch();
        $searchModel -> idEstado = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionVerhistorico($id)
    {
    	$searchModel = new ArticulosSearch();
    	$searchModel -> Codigo = $id;
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    	return $this->render('index_historico', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }

    /**
     * Displays a single Articulos model.
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
     * Creates a new Articulos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articulos();
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
        	$tags  = Yii::$app->request->post();
        	
        	//CREANDO TAGSARTICULOS
        	if (isset($tags['Tags'])){ //sin Tag
        	
        	$variosTags = $tags['Tags'];
        	for($i=0;$i<count($variosTags);$i++) {
        		$modelTA = new Tagsarticulos();
			 	$elTag = $variosTags[$i];
			 	$modelTA->idArticulo = $model->idArticulo;
			 	$modelTA->idTag = $elTag;
			 	
			 	//Crear nuevo tag si no existe.
			 	if (!is_numeric($elTag)){
			 		$modelTAG = new Tags();
			 		$modelTAG->Descripcion = $elTag;
			 		$modelTAG->save();
			 		$tagCreado = $this->findModelTags($elTag);
			 		$modelTA->idTag = $tagCreado[0]->idTag;
			 	}
			 	
			 	
				$modelTA->save();
			 				 	
        	}
        	}  //sin tag 

        	        	
        	return $this->redirect(['view', 'id' => $model->idArticulo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            	'datosusuario' => $this->datosusuario(),	
            ]);
        }
    }

    /**
     * Updates an existing Articulos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modeloViejo = New Articulos();
        
        if (Yii::$app->request->post()){
        	// Salvar Histórico
        	     
        	$modeloViejo -> Titulo = $model -> Titulo;
        	$modeloViejo -> Texto = $model -> Texto;
        	$modeloViejo -> Codigo = $id;
        	$modeloViejo -> FechaAlta = $model -> FechaAlta;
        	$modeloViejo -> idEstado = 2;
        	$modeloViejo -> idEmpleado = $model -> idEmpleado;
        	$modeloViejo -> save();
        	
        	$busqueda = $this->findModeldetags($id);
         	for($i=0;$i<count($busqueda);$i++) {
        			$elTag = $busqueda[$i];
        			$tagsArt = new Tagsarticulos();
        			$tagsArt -> idArticulo = $modeloViejo->idArticulo;
        			$tagsArt -> idTag = $elTag->idTag;
         			$tagsArt -> save();
	       	}
        	
	       	// Eliminar Tags
	       	$resultado = $this->findModeldetags($id);
	       	for($i=0;$i<count($resultado);$i++) {
	       		$elTag = $resultado[$i];
	       		$elTag->delete();
	       		 
	       	}
	       	
        	if ($model->load(Yii::$app->request->post()) && $model->save()) {
        		

        		$tags  = Yii::$app->request->post();
        		 
	        	//CREANDO TAGSARTICULOS
        		if (isset($tags['Tags'])){ // Sin Tag
        		
        		$variosTags = $tags['Tags'];
	        	for($i=0;$i<count($variosTags);$i++) {
	        		$modelTA = new Tagsarticulos();
				 	$elTag = $variosTags[$i];
				 	$modelTA->idArticulo = $model->idArticulo;
				 	$modelTA->idTag = $elTag;
				 	
				 	//Crear nuevo tag si no existe.
				 	if (!is_numeric($elTag)){
				 		$modelTAG = new Tags();
				 		$modelTAG->Descripcion = $elTag;
				 		$modelTAG->save();
				 		$tagCreado = $this->findModelTags($elTag);
				 		$modelTA->idTag = $tagCreado[0]->idTag;
				 	}
				 	
				 	
					$modelTA->save();
				 				 	
	        	}
        		} //fin Sin Tag
        		
        		return $this->redirect(['view', 'id' => $model->idArticulo]);}
        	
        }

        else {
        	$tagsBuscados = $this->findModeldetags($id);
        	$tagsActuales = [];
        	for($i=0;$i<count($tagsBuscados);$i++) {
        		$tagsActuales[] = $tagsBuscados[$i]['idTag'];
        	}
            return $this->render('update', [
                'model' => $model,
            	'tagsActuales' => $tagsActuales,
            	'datosusuario' => $this->datosusuario(),
            		
            ]);
        }
    }
    

    /**
     * Deletes an existing Articulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  public function actionDelete($id)
    {
		//Borrar Artículos Históricos
    	$historicos = $this->findModelhistoricos($id);
    	if ($historicos !== false){
	    	for($i=0;$i<count($historicos);$i++) {
	    		$elHistorico = $historicos[$i];
	    		
	    		$tagshistoricos = $this->findModeldetags($elHistorico->idArticulo);
	    		 
	    		for($a=0;$a<count($tagshistoricos);$a++) {
	    			$elTag = $tagshistoricos[$a];
 	    			$elTag->delete();
	    		}
	    		 
 	    		$elHistorico->delete();
	    	}
	    	
    	}
    	
    	//Borrar Artículo Actual
    	$resultado = $this->findModeldetags($id);
    	 
    	for($i=0;$i<count($resultado);$i++) {
    		$elTag = $resultado[$i];
    		
     		$elTag->delete();
    	}
     	$this->findModel($id)->delete();
    	
     	return  $this->redirect(['index']);
    	
    }
    
    
	public function actionMpdf($id) {
		$articulo = Articulos::findOne($id);
		$content = $this->renderPartial('vistampdf', array('model' => $articulo));
		$mpdf=new PDF([
				'mode' => Pdf::MODE_UTF8,
				'format' => Pdf::FORMAT_A4,
				'orientation' => Pdf::ORIENT_PORTRAIT,
				'destination' => Pdf::DEST_BROWSER,
				'content' => $content,
				'filename' => 'Clinica Wiki',
				// format content from your own css file if needed or use the
				// enhanced bootstrap css built by Krajee for mPDF formatting
				'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
				// any css to be embedded if required
				'cssInline' => '.kv-heading-1{font-size:18px}',
				// set mPDF properties on the fly
				'options' => ['title' => 'Clinica'],
				// call mPDF methods on the fly
				'methods' => [
//  						'SetHeader'=>['Header'],
						'SetFooter'=>['{PAGENO}'],
				]
				]);
  		return $mpdf->render();
}

    /**
     * Finds the Articulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    
    protected function findModel($id)
    {
        if (($model = Articulos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModeldetags($id)
    {
    	$busqueda = Tagsarticulos::find() ->where(['idArticulo' => $id]) ->all();
    	if ($busqueda !== null) {
    		return $busqueda;
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }
    
    protected function findModelcontags($id)
    {
    	if (($model = Articulos::find($id)) !== null && ($tags = Tagsarticulos::findOne($id)) !== null ) {
    		return [$model,$tags];
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }
    
    public function articulosVigentes($id){
    	if (($model = Articulos::findOne($id)) !==null){
    		return $model;
    	} else{
    		return false;
    	}
    }
    
    public function datosusuario(){
     		return Yii::$app->user->identity;
    }
    
    protected function findModelTags($Descripcion)
    {
    	$busqueda = Tags::find() ->where(['Descripcion' => $Descripcion]) ->all();
    	if ($busqueda != null) {
    		return $busqueda;
    	} else {
    		return false;
    	}
    }
    
    protected function findModelhistoricos($id)
    {
    	$busqueda = Articulos::find() ->where(['Codigo' => $id]) ->all();
    	if ($busqueda != null) {
    		return $busqueda;
    	} else {
    		return false;
    	}
    }
    
    public function actionIndextag()
    {
    	$searchModel = new ArticulosSearch();
    	$searchModel -> idEstado = 1;
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    	return $this->render('index', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
    
    
}
