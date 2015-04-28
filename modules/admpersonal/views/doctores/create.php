<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Doctores */

$this->title = Yii::t('app', 'Create Doctores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doctores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
