<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CapacitacionesDoctores */

$this->title = 'Crear Capacitaciones Doctores';
$this->params['breadcrumbs'][] = ['label' => 'Capacitaciones Doctores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitaciones-doctores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
