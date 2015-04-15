<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PracticasMedicas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Practicas Medicas',
]) . ' ' . $model->idPractica;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Practicas Medicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPractica, 'url' => ['view', 'id' => $model->idPractica]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="practicas-medicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
