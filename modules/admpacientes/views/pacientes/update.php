<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */


?>
<div class="pacientes-update">

    <br><h2><div class="col-sm-5" style="background-color: #333 ;color: #CCC;padding: 6px;-webkit-border-radius: 5px;
                 -moz-border-radius: 5px;border-radius: 5px;">Actualizar Paciente<div></h2><div style="clear: both;"></div><br><br>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
