<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Insumos */

$this->title = 'Carga de un Nuevo Insumo';
$this->params['breadcrumbs'][] = ['label' => 'Insumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insumos-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
