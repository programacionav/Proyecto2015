<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LiquidacionMensual */

$this->title = 'Create Liquidacion Mensual';
$this->params['breadcrumbs'][] = ['label' => 'Liquidacion Mensuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liquidacion-mensual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
