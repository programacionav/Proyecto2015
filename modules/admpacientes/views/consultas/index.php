<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpacientes\ConsultasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Consultas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Consultas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idConsulta',
            'FechaHora',
            'idDoctor',
            'idPaciente',
            'Diagnostico:ntext',
            'Tratamiento:ntext',
            // 'idObraSocial',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
