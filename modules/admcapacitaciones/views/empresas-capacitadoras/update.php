<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresasCapacitadoras */

$this->title = 'Actualizar Empresas Capacitadoras: ' . ' ' . $model->idEmpresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas Capacitadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmpresa, 'url' => ['view', 'id' => $model->idEmpresa]];
$this->params['breadcrumbs'][] = 'Aceptar';
?>
<div class="empresas-capacitadoras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
