<?php

use yii\helpers\Html;

echo '<style>
body {background-color:#ddffdd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Revisionestecnicas */

$this->title = 'Actualizar Revisiones Tecnicas: ' . ' ' . $model->idRevision;
$this->params['breadcrumbs'][] = ['label' => 'Revisiones Tecnicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRevision, 'url' => ['view', 'id' => $model->idRevision]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="revisionestecnicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $fechaAux= date_create($model->FechaCarga);
    $model->FechaCarga=  date_format($fechaAux,'d-m-Y');
    $fechaAux= date_create($model->FechaVigencia);
            $model->FechaVigencia=  date_format($fechaAux,'d-m-Y');
    ?>
    
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
