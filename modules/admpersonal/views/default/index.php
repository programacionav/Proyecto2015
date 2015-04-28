<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->registerJsFile('../vendor/bower/jquery/dist/jquery.min.js', array('position' => $this::POS_HEAD), 'jquery');

?>
<script type="text/javascript">
    $(document).ready(function(e) {
            $(".container ul > li > ul > li > a").click(
				function()
					{
						funcion = $(this).attr("name");
						divContenido = $("#contenido");
                                                titulo = $(".titulo");
						divContenido.empty();
						switch (funcion)
							{
								case "espVisualizar":
									divContenido.load(<?= "'".Yii::$app->urlManager->createAbsoluteUrl(["admpersonal/especialidades"])."'" ?>);
									titulo.html("Especialidades");
									break;
								case "espAgregar":
									divContenido.load("contenido/clientesBaja.html");
									titulo.html("Agregar Especialidad");
									break;
								case "clientesVisualizarTodos":
									divContenido.load("contenido/clientesVisualizarTodos.html");

									break;
									
								
							}
					}
			)
        });
</script>


<div class="admpersonal-default-index">
    <h1 class="titulo">Administración del personal</h1>
  <nav class="navbar navbar-default"> <!--navbar navbdefaultar- ¬ navbar navbar-inverse-->
  <div class="container">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Especializades<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#espVisualizar">Visualizar</a></li>
                <li><a href="#espAgregar">Agregar</a></li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Empleados<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#agregarEmpleado">Agregar Empleado</a></li>
                <li><a href="#doctores">Doctores</a></li>
                <li><a href="#enfermeros">Enfermeros</a></li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Licencias<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#licencias">Visualizar Licenciados</a></li>
                <li><a href="#licPendientes">Pendientes</a></li>
                <li><a href="#licHistorial">Historial</a></li>
                <li><a href="#licAgregar">Agregar Licencia</a></li>
            </ul>
        </li>
        
      </ul>
  </div>
</nav> 
</div>

<div id="contenido">
    
</div>

