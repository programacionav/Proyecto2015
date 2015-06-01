<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\EmpleadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Empleados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-index">

    <h1><?= Html::encode($this->title) ?> Inactivos</h1>
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
            //'Activo',
            'FechaBaja',
            'baja' => [
                'label' => 'Baja/Alta',
                'format' => 'raw',
                'value' => function ($data){
                if ($data->Activo == 0){
                return Html::a('Alta',['baja', 'id' => $data->idEmpleado] /*[Url::to(['licencias/create','idEmpleado'=>$data->idEmpleado])]*/, ['class' => 'btn btn-warning']);//idEmpleado
                }else{return "<center>-------</center>";}}
            ]
            ,
            //'licencia',
            

            //['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>
</div>

<div>
    
</div>