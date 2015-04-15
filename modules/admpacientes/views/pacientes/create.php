<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */

$this->title = Yii::t('app', 'Create Pacientes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pacientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
