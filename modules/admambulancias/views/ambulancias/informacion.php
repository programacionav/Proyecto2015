<?php
use yii\helpers\Url;
echo '<style>
body {background-color:#EEE}
</style> ';
?>
 
<a href="<?= Url::toRoute("ambulancias/index") ?>">Volver Ambulancias</a>
 
<h3>Ambulancia</h3>
<table class="table table-bordered">
    <tr>
        <th>Patente</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Numero de Motor</th>
    </tr>
    <?php foreach($model as $fila): ?>
    <tr>
        <td><?= $fila->Patente?></td>
        <td><?= $fila->Marca?></td>
        <td><?= $fila->Modelo?></td>
        <td><?= $fila->NroMotor ?></td>
    </tr>
    <?php endforeach ?>
    
</table>

<h3>Empleado Acargo</h3>
<table class="table table-bordered">
    <tr>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Email</th>
    </tr>
    <?php foreach($empleadoAcargo as $fila): ?>
    <tr>
        <td><?= $fila->Apellido?></td>
        <td><?= $fila->Nombre?></td>
        <td><?= $fila->DNI?></td>
        <td><?= $fila->Email ?></td>
    </tr>
    <?php endforeach ?>
    
</table>
<h3>Revisiones Tecnicas</h3>
<table class="table table-bordered">
    <tr>
        <th>Taller</th>
        <th>Fecha de Carga</th>
        <th>Fecha de Vigencia</th>
        <th>Observacion</th>
    </tr>
    <?php foreach($revisiones as $fila): ?>
    <tr>
        <td><?= $fila->Taller?></td>
        <td><?= $fila->FechaCarga?></td>
        <td><?= $fila->FechaVigencia?></td>
        <td><?= $fila->Observaciones ?></td>
    </tr>
    <?php endforeach ?>
    
</table>
<h3>Aseguradora</h3>
<table class="table table-bordered">
    <tr>
        <th>Aseguradora</th>
        <th>Número de Poliza</th>
        <th>Fecha desde</th>
        <th>Fecha hasta</th>
        <th>Valor Mensual</th>
    </tr>
    <?php foreach($aseguradora as $fila): ?>
    <tr>
        <td><?= $fila->Aseguradora?></td>
        <td><?= $fila->NroPoliza?></td>
        <td><?= $fila->FechaDesde?></td>
        <td><?= $fila->FechaHasta ?></td>
        <td><?= $fila->ValorMensual ?></td>
    </tr>
    <?php endforeach ?>
    
</table>

<?php /*echo '<input type="button" onclick=" window.print();" name="Guardar/Imprimir" value="Imprimir">' */?>