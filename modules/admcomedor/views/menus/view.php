<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admcomedor\admComedorModule;
use app\models\Menus;

/* @var $this yii\web\View */
/* @var $model app\models\Menus */

$this->title = $model->idMenu;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menus-view">

    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idMenu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idMenu], [
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
            'idMenu',
            'Fecha',
            'Descripcion:ntext',
            'Precio',
        ],
    ]) ?>
    
    <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>

</div>
