<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Licencias */

$this->title = Yii::t('app', 'Create Licencias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
