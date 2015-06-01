
<?php

use yii\helpers\Html;
use yii\grid\GridView;

echo '<style>
body {background-color:#ddffdd}
</style> ';
//a    {color:black}
//a:hover    {color:#ff5a85}
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admambulancias\models\RevisionestecnicasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Revisiones Tecnicas';

$this->params['breadcrumbs'][] = $this->title;
?>



<div class="revisionestecnicas-index">

    <h1><span class="glyphicon glyphicon-wrench" style="color: darkblue" aria-hidden="true"></span>&nbsp;&nbsp;<?= Html::encode($this->title) ?></h1>
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
        <?= Html::a('Revisiones Tecnicas', ['/admambulancias/revisionestecnicas'], ['class' => 'btn btn-success disabled']) ?>
        <?= Html::a('Seguros', ['/admambulancias/segurosambulancias'], ['class' => 'btn btn-default']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]);      ?>

    <p>
        <?= Html::a('Registrar Revision', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
                if($model->dias<15)
                        return ['class'=>'danger'];
                else
                        return ['class'=>'success'];

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'idRevision', 'label' => 'Revisión'],
            'Patente',
            'Taller',
            [
                'attribute' => 'FechaCarga',
                'label' => 'Carga',
                'format' => ['date', 'php:d / m / Y']
            ],
            [
                'attribute' => 'FechaVigencia',
                'label' => 'Vigencia',
                'format' => ['date', 'php:d / m / Y']
            ],
            [
                'format' => 'raw',
                'attribute' => 'vencimiento'
            ],
                    // 'Observaciones:ntext', 
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>


</div>

