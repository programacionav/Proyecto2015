<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Especialidades */

$this->title = $model->idEspecialidad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Especialidades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialidades-view">

    <h1>Especialidad: <?= Html::encode($model->Descripcion) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEspecialidad',
            'Descripcion',
        ],
    ]) ?>
    
    <p>
        <?= Html::a(Yii::t('app', 'Editar'), ['update', 'id' => $model->idEspecialidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->idEspecialidad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

