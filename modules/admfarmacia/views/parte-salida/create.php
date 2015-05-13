<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ParteSalida */

$this->title = 'Crear Nuevo Parte de Salida';
$this->params['breadcrumbs'][] = ['label' => 'Parte de Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parte-salida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
