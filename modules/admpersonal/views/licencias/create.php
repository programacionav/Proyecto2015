<?php

use yii\helpers\Html;
//use app\modules\admpersonal\controllers\EmpleadosController;
//$empCont = new EmpleadosController;

if (is_numeric($idEmpleado))
    {
    $empleado = \app\models\Empleados::findOne($idEmpleado);
    }


/* @var $this yii\web\View */
/* @var $model app\models\Licencias */

$this->title = Yii::t('app', 'Create Licencias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licencias-create">
    
    <h2>
        <?php if(isset($idEmpleado)& isset($empleado) & isset($idEstado))
            {
                echo "Crear licencia para: ".$empleado->Nombre." ".$empleado->Apellido;
            }
        ?>
    </h2>

    <?= $this->render('_form', [
        'model' => $model,
        'idEmpleado' => $idEmpleado,
        'idEstado'=> $idEstado,
    ]) ?>

</div>
