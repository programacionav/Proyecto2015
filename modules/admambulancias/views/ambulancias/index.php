<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

echo '<style>
body {background-color:#EEE}
</style> ';
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admambulancias\models\AmbulanciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ambulancias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambulancias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // Este es otro metodo de busqueda mas feo echo $this->render('_search', ['model' => $searchModel]);  ?>
    <p style="text-align: right;">
        <?= Html::a('Ambulancias', ['/admambulancias/ambulancias'], ['class' => 'btn btn-success disabled']) ?>
        <?= Html::a('Revisiones Tecnicas', ['/admambulancias/revisionestecnicas'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Seguros', ['/admambulancias/segurosambulancias'], ['class' => 'btn btn-default']) ?>
    </p>
    <p>
        <?= Html::a('Agregar Ambulancias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo 
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
             'attribute' =>'Patente'
            ,'label' => 'Patente'
            ],
            'Marca',
            'Modelo',
            
            ['attribute' => 'NroMotor','label' => 'Motor'],
            'FullNombre',
            /*
            [
                'attribute' => 'nombreempleado',
                'label' => 'Empleado',
                'format' => 'raw',
                'value' => function ($data) {// llamar a esta funcion del controlador :D
                    $tempId = $data["idEmpleado"];
                    $auxNomb = (ArrayHelper::map(\app\models\Empleados::find()->all(), 'idEmpleado', 'Nombre'));
                    $auxNomb = $auxNomb[$tempId];
                    $auxApe = (ArrayHelper::map(\app\models\Empleados::find()->all(), 'idEmpleado', 'Apellido'));
                    $auxNomb = $auxNomb.' '. $auxApe[$tempId];
                    return $auxNomb;
                }
            ],*/
            [
                'label' => 'Mirar',
                'format' => 'raw',
                'value' => function ($data) {
                    $tempId = $data["Patente"];
                            $sale = Html::a('Más Información', ['informacion', 'id' => $tempId]);                        
                    return $sale;
                },
                    ],        
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>

