<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PracticasMedicas */

$this->title = $model->idPractica;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Practicas Medicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practicas-medicas-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

</div>
