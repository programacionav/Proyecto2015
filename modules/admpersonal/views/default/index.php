         <?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
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
    <?php
NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'Especialidades',
            'items'=>[
                ['label' => 'Administrar', 'url' => ['especialidades/index']]
                     ],
            'options'=>["class"=>'dropdown-toggle']
            ],
        ['label' => 'Empleados',
            'items'=>[
                ['label' => 'Administrar', 'url' => ['empleados/create']],
                ['label' => 'Doctores', 'url' => ['doctores/index']],
                ['label' => 'Enfermeros', 'url' => ['enfermeros/index']],
                     ],
            'options'=>["class"=>'dropdown-toggle']
            ],
        ['label' => 'Licencias',
            'items'=>[
                ['label' => 'Licenciados', 'url' => ['licencias/index']],
                ['label' => 'Pendientes', 'url' => ['licencias/index']],
                ['label' => 'Historial', 'url' => ['licencias/index']],
                     ],
            'options'=>["class"=>'dropdown-toggle']
            ]
        
    ],
    'options'=>['class'=>'nav navbar-nav']
]);
NavBar::end();
?>
</div>
