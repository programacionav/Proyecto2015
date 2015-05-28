<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consultas */

?>
<div class="consultas-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idConsulta',
            'FechaHora',
            //'idDoctor',
            'idPaciente',
            'Diagnostico:ntext',
            'Tratamiento:ntext',
            'idObraSocial',
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idConsulta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idConsulta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
