<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PracticasMedicas */


?>
<div class="practicas-medicas-view">


    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPractica',
            'idTipoPractica',
            'FechaSolicitud',
            'FechaHoraRealizado',
            'idDoctor',
            'idPaciente',
            'Resultado:ntext',
            'idObraSocial',
            'Adjunto',
        ],
    ]) ?>
<p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idPractica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idPractica], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
