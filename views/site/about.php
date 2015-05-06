<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      Sistema de Gesti&oacute;n para un Equipo de Desarrollo. Desarrollado por los alumnos de la materia Programaci&oacute;n Web Avanzada de la Tecnicatura en Universitario 
      en Desarrollo Web de la Universidad Nacional del Comahue.
    </p>

    <h3>Enunciado Proyecto Cl&iacute;nica</h3>
    
    <p>Una nueva cl&iacute;nica de la ciudad tiene la necesidad de crear la forma de manipular y almacenar todo tipo de informaci&oacute;n que pueda estar relacionada con ella.  Para que se pueda realizar el correspondiente trabajo la  cl&iacute;nica tiene los siguientes requerimientos:</p>
	<p>Para la cl&iacute;nica es importante mantener todos los datos de los pacientes, idPaciente, Apellido, Nombre, DNI, Provincia, Localidad, Direcci&oacute;n, Tel&eacute;fono/s, Fecha de Nacimiento y si tiene obra social, nombre de la obra social y Nro de afiliado. Un paciente puede tener m&aacute;s de una obra social. </p>
    <p>Se requiere llevar registro de la historia cl&iacute;nica de cada paciente, esto incluye: consultas, pr&aacute;cticas m&eacute;dicas, internaciones. </p>
    <p>De cada consulta se registra Paciente, fecha, hora, el doctor que lo atendi&oacute;, diagnostico, tratamiento sugerido.</p>
    <p>De cada pr&aacute;ctica m&eacute;dica se registra: Paciente, Fecha de solicitud, Fecha y hora de realizaci&oacute;n, Tipo de Pr&aacute;ctica, Doctor que realiz&oacute; la solicitud, Resultado.</p>
    <p>De las internaciones se registra: Paciente, Fecha y hora de ingreso, Fecha y hora egreso, Nro de habitaci&oacute;n, Doctor que realiz&oacute; la solicitud de internaci&oacute;n, diagnostico que justifica la internaci&oacute;n. Adem&aacute;s durante el periodo de internaci&oacute;n se realizan visitas medicas, de debe registrar fecha y hora de visita, estado del paciente, doctor. Tambi&eacute;n es fundamental llevar control de que medicaci&oacute;n y la enfermera a cargo de suministrar al paciente.</p>
    <p>Tambi&eacute;n se deben realizar una administraci&oacute;n de turnos para las consultas. Para ello es necesario saber qu&eacute; d&iacute;as y en que horarios atiene cada doctor. Cuando un paciente pide un turno se registra fecha y hora, doctor, obra social, consultorio. Y debe quedar constancia si el paciente asisti&oacute; al turno solicitado. Los turnos tienen una duraci&oacute;n de media hora por paciente.</p>
    <p>En cuanto a la informaci&oacute;n que lleva de su personal, esta lo clasifica en: personal administrativo (rrhh, contabilidad, finanzas, etc), doctores y enfermeras. Adem&aacute;s se tienen las siguientes caracter&iacute;sticas importantes: un doctor puede dirigir un &aacute;rea espec&iacute;fica como decir: pediatr&iacute;a, cardiolog&iacute;a, odontolog&iacute;a, etc. Todos los doctores trabajan en un &aacute;rea espec&iacute;fica.</p>
    <p>Se desea llevar un registro de las licencias del personal, con fecha inicio, fecha fin, tipo de licencia, certificado adjunto.</p>
    <p>La cl&iacute;nica cuenta con un comedor para el personal. Cada empleado debe reservar con anticipaci&oacute;n el plato del d&iacute;a, indicando si requiere alg&uacute;n cambio sobre el men&uacute;. Se debe registrar si se retiro o no el men&uacute; reservado.</p>
    <p>Asociada a la cl&iacute;nica se encuentra tambi&eacute;n la farmacia. Y es necesario tener control de las compras que se realizan a las droguer&iacute;as proveedoras para reponer los medicamentos y las solicitudes de salida de insumo para consumici&oacute;n de la cl&iacute;nica.</p>
    <p>Los doctores empleados en la cl&iacute;nica han creado una wiki (un sitio web cuyo contenido puede ser editado por m&uacute;ltiples usuarios colaboradores a trav&eacute;s del navegador web) para compartir art&iacute;culos m&eacute;dicos. Cada vez que se genera una revisi&oacute;n sobre un art&iacute;culo, se crea como un art&iacute;culo nuevo reservando la versi&oacute;n anterior como hist&oacute;rica o versi&oacute;n superada. </p>
    <p>La cl&iacute;nica cuenta tambi&eacute;n con un conjunto de ambulancias, por las cuales se paga un seguro y se les deben realizar las revisaciones t&eacute;cnicas correspondientes. Tanto el pago del seguro con las revisiones t&eacute;cnicas tienen un periodo de validez, por lo que es muy importante para la cl&iacute;nica saber con anticipaci&oacute;n las fechas es que se deben renovar a trav&eacute;s de alertas que brinde el sistema.</p>
    <p>Los doctores que trabajan en la cl&iacute;nica tambi&eacute;n reciben peri&oacute;dicamente capacitaciones dictadas por empresas capacitadoras externas. Se deben poder generar reportes de de las capacitaciones dictadas, con asistentes y calificaciones. Tambi&eacute;n es necesario saber, dado un doctor en particular todas las capacitaciones que ha recibido en la cl&iacute;nica. </p>
   
    
   
</div>