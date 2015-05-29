<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
?>
<div class="admcapacitaciones-default-index">
    <h1>INICIO</h1>
    <?php
	NavBar::begin();
	echo Nav::widget([
	    'items' => [
	        ['label' => 'Capacitaciones',
	            'items'=>[
	                ['label' => 'Tabla', 'url' => ['capacitaciones/index']],
	            	['label' => 'Filtrar por fecha', 'url' => ['capacitaciones/porfecha']]
	                     ],
	            'options'=>["class"=>'dropdown-toggle']
	            ],
	        ['label' => 'Capacitadores',
	            'items'=>[
	                ['label' => 'Tabla', 'url' => ['capacitadores/index']],
	                     ],
	            'options'=>["class"=>'dropdown-toggle']
	            ],
	        ['label' => 'Capacitaciones Doctores',
	            'items'=>[
	                ['label' => 'Tabla', 'url' => ['capacitaciones-doctores/index']],
	                     ],
	            'options'=>["class"=>'dropdown-toggle']
	            ],
	    		['label' => 'Empresas Capacitadoras',
	    		'items'=>[
	    				['label' => 'Tabla', 'url' => ['empresas-capacitadoras/index']],
	    				],
	            'options'=>["class"=>'dropdown-toggle']
	    				]
	        
	    ],
	    'options'=>['class'=>'nav navbar-nav']
	]);
	NavBar::end();
	?>
</div>
