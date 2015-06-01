<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\EnfermerosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Enfermeros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enfermeros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'espDescripcion',
            "Apellido",
            "Nombre",
            "FechaIngreso",
            'licencia' => [
                'label' => 'Licencia',
                'format' => 'raw',
                'value' => function ($data){
                if ($data->Activo == 1){
                return Html::a('Licencia',['licencias/create', 'idEmpleado' => $data->idEmpleado, 'idEstado' => "3" ] /*[Url::to(['licencias/create','idEmpleado'=>$data->idEmpleado])]*/, ['class' => 'btn btn-success']);//idEmpleado
                }else{return "<center>-------</center>";}}
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
            //'idEnfermero',
            
            //'idEspecialidad',
            

            //['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>
    
    <p>
        <?php //= Html::a(Yii::t('app', 'Agregar Enfermero'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
