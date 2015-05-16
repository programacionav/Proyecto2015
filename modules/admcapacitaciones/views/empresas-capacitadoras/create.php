<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmpresasCapacitadoras */

$this->title = 'Crear Empresas Capacitadoras';
$this->params['breadcrumbs'][] = ['label' => 'Empresas Capacitadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-capacitadoras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
