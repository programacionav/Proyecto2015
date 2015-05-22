<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admcapacitaciones\models\EmpresasCapacitadorasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas Capacitadoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-capacitadoras-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Empresas Capacitadoras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEmpresa',
            'Cuit',
            'RazonSocial',
            'Direccion',
            'Telefono',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
