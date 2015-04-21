<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */

$this->title = 'Update Articulos: ' . ' ' . $model->idArticulo;
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idArticulo, 'url' => ['view', 'id' => $model->idArticulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articulos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
