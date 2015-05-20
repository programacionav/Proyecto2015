<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo '<style>
body {background-color:#ffdddd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\modules\admambulancias\models\AmbulanciasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ambulancias-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'Patente') ?>

    <?= $form->field($model, 'Marca') ?>

    <?= $form->field($model, 'Modelo') ?>

<?= $form->field($model, 'NroMotor') ?>

        <?= $form->field($model, 'idEmpleado') ?>

    <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
