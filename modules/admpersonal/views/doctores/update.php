<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doctores */

$this->title = "Dr. ".$model->Nombre." ".$model->Apellido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDoctor, 'url' => ['view', 'id' => $model->idDoctor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="doctores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
