<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Dropdown;

/* @var $this yii\web\View */
/* @var $model app\models\Insumos */

$this->title = $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Insumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insumos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idInsumo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idInsumo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este Insumo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idInsumo',
            'NroSerie',
            'idProveedor',
            'FechaVencimiento',
            'Descripcion',
            'Precio',
            'Stock',
        ],
    ]) ?>

</div>
