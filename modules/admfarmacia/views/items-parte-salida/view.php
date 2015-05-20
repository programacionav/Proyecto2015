<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**** QUIERO QUE SE MUESTRE DESCRIPCION DE INSUMOS, NO SU ID *****/

/* @var $this yii\web\View */
/* @var $model app\models\ItemsParteSalida */
$tit = 'Numero de Item: ';
$this->title = $tit.$model->idItem;
$this->params['breadcrumbs'][] = ['label' => 'Items Parte Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-parte-salida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ACTUALIZAR', ['update', 'id' => $model->idItem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('BORRAR', ['delete', 'id' => $model->idItem], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([    	
        'model' => $model,
        'attributes' => [
            'idItem',
            'idParte',            
            'Cantidad',
            'Descripcion',
           
        ],
    ]) ?>

</div>
