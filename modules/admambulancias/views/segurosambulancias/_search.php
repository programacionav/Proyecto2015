<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo '<style>
body {background-color:#ddddff}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\modules\admambulancias\models\SegurosambulanciasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="segurosambulancias-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'idseguro') ?>

    <?= $form->field($model, 'Patente') ?>

    <?= $form->field($model, 'NroPoliza') ?>

    <?= $form->field($model, 'Aseguradora') ?>

    <?= $form->field($model, 'FechaDesde') ?>

<?php // echo $form->field($model, 'FechaHasta')  ?>

        <?php // echo $form->field($model, 'ValorMensual') ?>

    <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
