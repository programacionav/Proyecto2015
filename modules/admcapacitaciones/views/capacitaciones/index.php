<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admcapacitaciones\models\CapacitacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capacitaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Capacitaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCapacitacion',
            'Nombre',
            'Descripcion:ntext',
            'Fecha',
            'DuracionHoras',
            // 'idCapacitador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
