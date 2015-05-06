<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Capacitaciones;
use app\models\EmpresasCapacitadoras;
?>

<div class="capacitaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['porempresa'],
        'method' => 'get',
    ]); ?>
		<?= Html::dropDownList('id', null,
      ArrayHelper::map(EmpresasCapacitadoras::find()->all(), 'idEmpresa', 'RazonSocial')) ?>
    <div class="form-group">
    <br />
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
	    </div>
    <?php ActiveForm::end(); ?>

</div>
