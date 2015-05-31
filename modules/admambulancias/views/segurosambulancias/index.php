<?php

use yii\helpers\Html;
use yii\grid\GridView;

echo '<style>
body {background-color:#ddffdd}
</style> ';
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admambulancias\models\SegurosambulanciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seguros de Ambulancias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="segurosambulancias-index">

    <h1><span class="glyphicon glyphicon-briefcase" style="color: darkgreen" aria-hidden="true"></span>&nbsp;&nbsp;<?= Html::encode($this->title) ?></h1>
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
        <?= Html::a('Ambulancias', ['/admambulancias/ambulancias'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Revisiones Tecnicas', ['/admambulancias/revisionestecnicas'], ['class' => 'btn btn-default']) ?>
<?= Html::a('Seguros', ['/admambulancias/segurosambulancias'], ['class' => 'btn btn-success disabled']) ?>
    </p>

<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
<?= Html::a('Alta de seguro', ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
                if($model->dias<15){return ['class'=>'danger'];}
                else{return ['class'=>'success'];}

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'idseguro', 'label' => 'Seguro'],
            'Patente',
            ['attribute' => 'NroPoliza', 'label' => 'Póliza'],
            'Aseguradora',
            [
                'attribute' => 'FechaDesde',
                'format' => ['date', 'php:d / m / Y'],
                'label' => 'Desde'
            ],
            [
                'attribute' => 'FechaHasta',
                'format' => ['date', 'php:d / m / Y'],
                'label' => 'Hasta'
            ],
            [
                'format' => 'raw',
                'attribute' => 'vencimiento'
            ],
                    // 'FechaHasta',
                    // 'ValorMensual',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>


</div>
