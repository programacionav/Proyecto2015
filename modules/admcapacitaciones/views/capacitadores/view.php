<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Capacitadores */

$this->title = $model->Nombre.', '.$model->Apellido;
$this->params['breadcrumbs'][] = ['label' => 'Capacitadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitadores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idCapacitador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idCapacitador], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro quire borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCapacitador',
        	['label' => 'Empresa capacitadora', 'value' => $model->idEmpresaCapacitadora0->RazonSocial],
            'Apellido',
            'Nombre',
        	['label' => 'Especialidad del capacitador', 'value' => $model->idEspecialidad0->Descripcion],
        ],
    ]) ?>

</div>
