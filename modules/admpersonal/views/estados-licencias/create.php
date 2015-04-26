<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadosLicencias */

$this->title = Yii::t('app', 'Create Estados Licencias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados Licencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estados-licencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
