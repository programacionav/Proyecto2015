<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Licencias */

$this->title = Yii::t('app', 'Editar Licencia: ', [
    'modelClass' => 'Licencias',
]) . ' ' . $model->idLicencia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLicencia, 'url' => ['view', 'id' => $model->idLicencia]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="licencias-update">

    <h1>
        <?php
            $empleado = \app\models\Empleados::findOne($idEmpleado);
            if (isset($_GET['idEstado'])){
                $idEstado = $_GET['idEstado'];
                echo "Aprobar Licencia para: ".$empleado->Nombre." ".$empleado->Apellido;
            }
            else {$idEstado = "3"; echo Html::encode($this->title);}
         ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
        'idEmpleado' => $idEmpleado,
        'idEstado' => $idEstado
    ]) ?>

</div>
