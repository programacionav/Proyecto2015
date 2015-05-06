<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ItemsParteSalida */

$this->title = 'Create Items Parte Salida';
$this->params['breadcrumbs'][] = ['label' => 'Items Parte Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-parte-salida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
