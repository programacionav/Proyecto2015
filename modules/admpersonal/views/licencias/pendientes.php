<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Licencias;
$licencias = new Licencias();

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\LicenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Licencias Pendientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licencias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a(Yii::t('app', 'Create Licencias'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'Nombre',
            'Apellido',
            //'idLicencia',
            //'idTipoLicencia',
            'desTipoLicencia',
            //'idEmpleado',
            
            'FechaInicio',
            'FechaFin',
            'idEstado',
            'Aprobacion' => [
                'label' => 'Aprobar',
                'format' => 'raw',
                'value' => function ($data){
                    if ($data->idEstado == "3"){
                    return Html::a('Aprobar',['licencias/update', 'id' => $data->idLicencia, 'idEmpleado' => $data->idEmpleado, 'idEstado' => "1" ] /*[Url::to(['licencias/create','idEmpleado'=>$data->idEmpleado])]*/, ['class' => 'btn btn-primary']);//idEmpleado
                    }else{return "<center>".$data->idTipoLicencia."</center>";}}
                    ],
            'rechazo' =>[
                'label' => 'Aprobar',
                'format' => 'raw',
                'value' => function ($data){
                    if ($data->idEstado == "3"){
                    return Html::a('Rechaza',['licencias/update', 'id' => $data->idLicencia, 'idEmpleado' => $data->idEmpleado, 'idEstado' => "2" ] /*[Url::to(['licencias/create','idEmpleado'=>$data->idEmpleado])]*/, ['class' => 'btn btn-danger']);//idEmpleado
                    }else{return "<center>".$data->idTipoLicencia."</center>";}}
                    ]
                
            
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
