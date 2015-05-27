<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\EmpleadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Empleados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idEmpleado',
            'Apellido',
            'Nombre',
            'DNI',
            'NroEmpleado',
            // 'FechaIngreso',
            // 'Email:email',
            'Activo' => [
                'label' => 'Estado',
                'format' => 'raw',
                'value' => function($data){
                    if ($data->Activo == 1){return "Activo";}
                    else {return "Inactivo";}
                }
                
            ],
            'licencia' => [
                'label' => 'Licencia',
                'format' => 'raw',
                'value' => function ($data){
                if ($data->Activo == 1){
                return Html::a('Licencia',['licencias/create', 'idEmpleado' => $data->idEmpleado, 'idEstado' => "3" ] /*[Url::to(['licencias/create','idEmpleado'=>$data->idEmpleado])]*/, ['class' => 'btn btn-success']);//idEmpleado
                }else{return "<center>-------</center>";}}
            ]
            ,
            // 'FechaBaja',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Empleado'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>

<div>
    
</div>