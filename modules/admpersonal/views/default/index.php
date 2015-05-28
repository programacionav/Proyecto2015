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
            //'Activo',
            'licencia' => [
                'format' => 'raw',
                'value' => 'Sin Licencia'
            ]
            ,
            // 'FechaBaja',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Empleado'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>

<div>
    
</div>