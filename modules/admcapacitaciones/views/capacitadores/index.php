<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admcapacitaciones\models\CapacitadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capacitadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitadores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Capacitadores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCapacitador',
            'idEmpresaCapacitadora',
            'Apellido',
            'Nombre',
            'idEspecialidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
