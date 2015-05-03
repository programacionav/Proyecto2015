         <?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\web\View;
$pag = new View();
//$this->registerJsFile('../vendor/bower/jquery/dist/jquery.min.js', array('position' => $this::POS_HEAD), 'jquery');

?>
<script type="text/javascript">
   /* $(document).ready(function(e) {
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
        });*/
</script>


<div class="admpersonal-default-index">
    <h1 class="titulo">Administración del personal</h1>
    <?= $pag->render("../barramenu.php"); ?>
</div>
