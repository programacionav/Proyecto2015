<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpacientes\PracticasMedicasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Practicas Medicas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practicas-medicas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a(Yii::t('app', 'Create Practicas Medicas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idPractica',
            'idTipoPractica',
            'FechaSolicitud',
            'FechaHoraRealizado',
            'idDoctor',
            'Descripcion',
            // 'idPaciente',
            // 'Resultado:ntext',
            // 'idObraSocial',
            // 'Adjunto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
