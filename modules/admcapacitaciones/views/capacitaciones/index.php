<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admcapacitaciones\models\CapacitacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capacitaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear una capacitaci&oacute;n', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCapacitacion',
            'Nombre',
            'Descripcion:ntext',
        	['attribute' => 'Fecha',
        	'value' => 'Fecha',
        	'format' => 'raw',
        	'filter' => DatePicker::widget([
        				'model' => $searchModel,
        				'attribute' => 'Fecha',
        				'clientOptions' => [
        				'autoclose' => true,
        				'format' => 'yyyy-mm-dd']]),],
            'DuracionHoras',
            // 'idCapacitador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <br />
    <h3>Capacitaciones por rango de fechas.</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
