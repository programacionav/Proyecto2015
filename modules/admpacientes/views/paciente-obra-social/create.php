<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PacienteObraSocial */

$this->title = Yii::t('app', 'Create Paciente Obra Social');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paciente Obra Socials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-obra-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
