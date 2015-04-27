<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Especialidades */

$this->title = Yii::t('app', 'Create Especialidades');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Especialidades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
