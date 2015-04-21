<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tagsarticulos */

$this->title = 'Update Tagsarticulos: ' . ' ' . $model->idArticulo;
$this->params['breadcrumbs'][] = ['label' => 'Tagsarticulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idArticulo, 'url' => ['view', 'idArticulo' => $model->idArticulo, 'idTag' => $model->idTag]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tagsarticulos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
