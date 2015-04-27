<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admcomedor\models\LiquidacionMensualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Liquidacion Mensual';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liquidacion-mensual-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Liquidacion Mensual', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idliquidacion',
            'Mes',
            'Anio',
            'Total',
            'idEmpleado',
            // 'Pagada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
