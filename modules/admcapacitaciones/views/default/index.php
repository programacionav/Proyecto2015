<?php
use yii\helpers\Html;
?>
<div class="admcapacitaciones-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p><?= Html::a('Tabla Capacitaciones', ['capacitaciones/index']); ?></p>
    <p><?= Html::a('Tabla Capacitadores', ['capacitadores/index']); ?></p>
    <p><?= Html::a('Tabla de Empresas Capacitadoras', ['empresas-capacitadoras/index']); ?></p>
    <p><?= Html::a('Tabla relacional Capacitaciones y Doctores', ['capacitaciones-doctores/index']) ?></p>
    <p><?= Html::a('Filtro de capacitaciones por fecha.', ['capacitaciones/porfecha']) ?></p>
</div>
