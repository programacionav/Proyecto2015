<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tiposlicencias */

$this->title = Yii::t('app', 'Create Tiposlicencias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tiposlicencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposlicencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
