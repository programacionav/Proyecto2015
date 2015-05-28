<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

//Para buscar en ajax
use yii\widgets\Pjax;

echo '<style>
body {background-color:#ddffdd}
</style> ';
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admambulancias\models\AmbulanciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ambulancias';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="ambulancias-index">

    <h1><span class="glyphicon glyphicon-plus" style="color: darkred" aria-hidden="true"></span>&nbsp;&nbsp;<?= Html::encode($this->title) ?></h1>
    <?php
    $usuario = Yii::$app->user->identity;

    $rolnum = $usuario['idRol'];
    $rol = 'Enfermero';
    if ($rolnum == 1) {
        $rol = 'Administrador';
    } else {
        if ($rolnum == 2) {
            $rol = 'Doctor';
        }
    }
    $usuarioTemp = strtoupper($usuario['Usuario']);
    echo "<p style='color:green;'>  " . $usuarioTemp . " (" . $rol . ")</p>";
    ?>
    <p style="text-align: right;">
        <?= Html::a('Ambulancias', ['/admambulancias/ambulancias'], ['class' => 'btn btn-success disabled']) ?>
        <?= Html::a('Revisiones Tecnicas', ['/admambulancias/revisionestecnicas'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Seguros', ['/admambulancias/segurosambulancias'], ['class' => 'btn btn-default']) ?>
    </p>
    <p>
        <?= Html::a('Agregar Ambulancias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php    Pjax::begin(); ?>
    <?php 

    echo 
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
    <?php    Pjax::end(); ?>

</div>

