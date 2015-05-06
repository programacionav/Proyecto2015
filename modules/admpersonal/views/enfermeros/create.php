<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enfermeros */

$this->title = Yii::t('app', 'Create Enfermeros');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enfermeros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enfermeros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
