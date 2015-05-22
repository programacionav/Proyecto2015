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
            'idDoctor',
            'idCapacitacion',
            'Resultado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
