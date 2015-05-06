<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doctores */

$this->title = $model->idDoctor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctores-view">

    <h1>Doctor | <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idDoctor',
            'idEspecialidad',
            'Matricula',
        ],
    ]) ?>
    
    <p>
        <?= Html::a(Yii::t('app', 'Editar'), ['update', 'id' => $model->idDoctor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->idDoctor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
