<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermeros */

$this->title = $model->idEnfermero;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enfermeros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enfermeros-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idEnfermero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idEnfermero], [
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
            'idEnfermero',
            'idEspecialidad',
        ],
    ]) ?>

</div>
