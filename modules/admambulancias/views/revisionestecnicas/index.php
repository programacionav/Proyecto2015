
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

    <h1><?= Html::encode($this->title) ?></h1>
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'idRevision','label' => 'Revisión'],
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
                'label' => 'Estado',
                'format' => 'raw',
                'value' => function ($data) {// llamar a esta funcion del controlador :D
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
                },
                    ],
                    // 'Observaciones:ntext', 
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>


</div>

