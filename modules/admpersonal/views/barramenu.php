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

