<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tagsarticulos */

$this->title = $model->idArticulo;
$this->params['breadcrumbs'][] = ['label' => 'Tagsarticulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagsarticulos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idArticulo' => $model->idArticulo, 'idTag' => $model->idTag], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idArticulo' => $model->idArticulo, 'idTag' => $model->idTag], [
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
            'idArticulo',
            'idTag',
        ],
    ]) ?>

</div>
