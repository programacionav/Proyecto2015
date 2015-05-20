<?php

use yii\helpers\Html;

echo '<style>
body {background-color:#ddddff}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Segurosambulancias */

$this->title = 'Envio de aviso - Seguro: ' . ($model->idseguro);
$this->params['breadcrumbs'][] = ['label' => 'Seguros de Ambulancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="segurosambulancias-view">

    <h1>Envio de aviso</h1>

    <br>


    <?php
    $auxPat = $model["Patente"];
    
   $mensaje = wordwrap("Quedan pocos dias para que pierda vigencia su seguro sobre la ambulancia con patente ".$auxPat, 70, "\r\n");
    /* //Al descomentar esto envia el mail de verdad!!
     * $mensaje = wordwrap('Quedan pocos dias para que pierda vigencia su revision tecnica', 70, "\r\n");
     * mail($auxMail, 'Seguro Ambulancia', $mensaje);
     */
    echo "Fue enviado:<br>".$mensaje."<br>A: " . $emailEmpleado;
    ?>
    <br>   <br>   <br>   <br>
    <p>
        <?= Html::a('Volver', '', ['class' => 'btn btn-primary', 'onclick' => 'history.back()']) ?>

    </p>


</div>
