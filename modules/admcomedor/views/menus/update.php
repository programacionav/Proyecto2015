<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menus */

$this->title = 'Modificar Menu '.$model->idMenu;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMenu, 'url' => ['view', 'id' => $model->idMenu]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="menus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
