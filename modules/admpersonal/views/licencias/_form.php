<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Licencias */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<div class="licencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoLicencia')->dropDownList(ArrayHelper::map(\app\models\Tiposlicencias::find()->all(), "idTipoLicencia", "Descripcion")) ?>

    <?= $form->field($model, 'idEmpleado')->textInput() ?>

    <?= $form->field($model, 'FechaInicio')->textInput(["type"=>"date"]) ?>

    <?= $form->field($model, 'FechaFin')->textInput() ?>

    <?= $form->field($model, 'idEstado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
