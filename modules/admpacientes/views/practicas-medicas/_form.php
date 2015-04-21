<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PracticasMedicas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="practicas-medicas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoPractica')->textInput() ?>

    <?= $form->field($model, 'FechaSolicitud')->textInput() ?>

    <?= $form->field($model, 'FechaHoraRealizado')->textInput() ?>

    <?= $form->field($model, 'idDoctor')->textInput() ?>

    <?= $form->field($model, 'idPaciente')->textInput() ?>

    <?= $form->field($model, 'Resultado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idObraSocial')->textInput() ?>

    <?= $form->field($model, 'Adjunto')->textInput(['maxlength' => 250]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
