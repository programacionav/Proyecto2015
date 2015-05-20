<?php

use yii\helpers\Html;
use yii\grid\GridView;
echo '<style>
body {background-color:#ddddff}
</style> ';
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admambulancias\models\SegurosambulanciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seguros de Ambulancias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="segurosambulancias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p style="text-align: right;">
        <?= Html::a('Ambulancias', ['/admambulancias/ambulancias'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Revisiones Tecnicas', ['/admambulancias/revisionestecnicas'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Seguros', ['/admambulancias/segurosambulancias'], ['class' => 'btn btn-success disabled']) ?>
    </p>
        
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Alta de seguro', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'idseguro','label' => 'Seguro'],
            'Patente',
            ['attribute' => 'NroPoliza','label' => 'Póliza'],
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
                'label' => 'Estado',
                'format' => 'raw',
                'value' => function ($data) {// llamar a esta funcion del controlador :D
                    $tempId = $data["idseguro"];

                    date_default_timezone_set('America/Argentina/Buenos_Aires');

                    $fechaVigencia = $data['FechaHasta'];
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
                },
                    ],
            // 'FechaHasta',
            // 'ValorMensual',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    

</div>
