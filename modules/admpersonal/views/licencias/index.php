<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Licencias;
$licencias = new Licencias();

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\LicenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Licencias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licencias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Licencias'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idLicencia',
            //'idTipoLicencia',
            //'idEmpleado',
            'Nombre',
            'FechaInicio',
            'FechaFin',
            'desTipoLicencia',
            'Estado'=> 
                [
                    'label'=>'Estado Licencia',
                    'format'=>'raw',
                    'value'=> function($data){
                        if ($data->idEstado == 3)
                            { return Html::a('Aprobar', ['update','id' => $data->idLicencia, 'idEstado'=> "1"], ['class' => 'btn btn-success']);}}
                ],
            // 'idEstado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
