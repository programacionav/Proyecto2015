<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermeros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enfermeros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEnfermero')->textInput() ?>

    <?= $form->field($model, 'idEspecialidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
