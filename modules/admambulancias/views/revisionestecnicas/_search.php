<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo '<style>
body {background-color:#ddffdd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\modules\admambulancias\models\RevisionestecnicasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revisionestecnicas-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'idRevision') ?>

    <?= $form->field($model, 'Patente') ?>

    <?= $form->field($model, 'Taller') ?>

    <?= $form->field($model, 'FechaCarga') ?>

<?= $form->field($model, 'FechaVigencia') ?>

        <?php // echo $form->field($model, 'Observaciones') ?>

    <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
