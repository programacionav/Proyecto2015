<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admcapacitaciones\models\CapacitacionesDoctoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capacitaciones Doctores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitaciones-doctores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Capacitaciones Doctores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idCD',
        	['format' => 'html', 'attribute' => 'idDoctor', 'value' => function($model){ return Html::a($model->idDoctor0->Apellido, ['pordoctor', 'id' => $model->idDoctor, 'nombre' => $model->idDoctor0->Nombre, 'apellido' => $model->idDoctor0->Apellido]).', '.$model->idDoctor0->Nombre;}],
            ['attribute' => 'idCapacitacion', 'value' => 'idCapacitacion0.Nombre' ],
            'Resultado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

