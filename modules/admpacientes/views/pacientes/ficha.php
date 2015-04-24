<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="col-md-6">
     <?= GridView::widget([
         'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            'idConsulta',
            'FechaHora',
            'idDoctor',
            'idPaciente',
            'Diagnostico:ntext',
            // 'Tratamiento:ntext',
            // 'idObraSocial',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div> 

    

