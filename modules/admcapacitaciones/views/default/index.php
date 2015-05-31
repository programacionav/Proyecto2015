<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
$usuario = Yii::$app->user->identity;
$rol = 'Bienvenido ';
?>
<div class="admcapacitaciones-default-index">
    <h1>INICIO</h1>
    <?php
    switch ($usuario['idRol']){
    	case 1: $rol = $rol.$usuario['Usuario'].' (Administrador)';
    	break;
    	case 2: $rol= $rol.$usuario['Usuario'].' (Doctor)';
    	break;
    	case 3: $rol = $rol.$usuario['Usuario'].' (Enfermero)';
    	break;
    	default : $rol = $rol.'usuario invitado';
    	break;
    
    }
    echo '<h5>'.$rol.'</h5>';
    if($usuario['idRol'] == 1)
    {
	NavBar::begin();
	echo	Nav::widget([
	    			'items' =>
	    			[
	    				['label' => 'Capacitaciones',
	    					'items'=>
	    						[
		    						['label' => 'Tabla', 'url' => ['capacitaciones/index']],
		    						['label' => 'Filtrar por fecha', 'url' => ['capacitaciones/porfecha']]
	    						],
	    					'options'=>["class"=>'dropdown-toggle']
	    				],
		        		['label' => 'Capacitadores',
	    					'items'=>
		        				[
	    							['label' => 'Tabla', 'url' => ['capacitadores/index']],
	    						],
	    					'options'=>["class"=>'dropdown-toggle']
	    				],
	    					[
	    						'label' => 'Capacitaciones Doctores',
	    						'items'=>
	    							[
	    								['label' => 'Tabla', 'url' => ['capacitaciones-doctores/index']],
	    							],
	    						'options'=>["class"=>'dropdown-toggle']
		            		],
	    				[
	    					'label' => 'Empresas Capacitadoras',
	    					'items'=>
	    						[
	    							['label' => 'Tabla', 'url' => ['empresas-capacitadoras/index']],
	    						],
	    					'options'=>["class"=>'dropdown-toggle']
	    				]
	    					
	    			],
		    		'options'=>['class'=>'nav navbar-nav']]);
	    		NavBar::end();
    }
    else
    {
    	NavBar::begin();
    	echo	Nav::widget([
	    			'items' =>
	    			[
	    				['label' => 'Mis calificaciones',
	    					'items'=>
	    						[
		    						['label' => 'Tabla', 'url' => ['capacitaciones-doctores/pordoctor', 'id' => $usuario['idEmpleado'], 'nombre' => $usuario['Usuario'], 'apellido' => '']],
	    						],
	    					'options'=>["class"=>'dropdown-toggle']
	    				],
	    			],
		    		'options'=>['class'=>'nav navbar-nav']]);
	    		NavBar::end();
    }
	?>
</div>
