<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermeros */

$this->title = "Enfermero: ".$model->Nombre." ".$model->Apellido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enfermeros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEnfermero, 'url' => ['view', 'id' => $model->idEnfermero]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="enfermeros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
