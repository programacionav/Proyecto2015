<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

    
    <?php $f = ActiveForm::begin([
        
        "method" => "get",
        "action" => Url::toRoute (['ficha', 'id' => $model->idPaciente]), 
        "enableClientValidation" => true,
    ]);
    ?>
    
    <div class="form-group">
        <?= $f->field($form,"q")->input("search") ?>
    </div>
    
    <?= Html::submitButton("Filtrar",["class" =>"btn btn-primary"]) ?>
    
    <?php $f -> end()?>
    
    <h3><?= $search ?></h3>
    
    <h3>Consultas </h3>

    <table class="table table-bordered">
        <tr>
            <th>Fecha y Hora</th>
            <th>Diagnostico</th>
            <th>Tratamiento</th>
        </tr>
        <?php foreach($consultas as $row): ?>
        <tr>
            <td><?= $row -> FechaHora ?></td>
            <td><?= $row -> Diagnostico ?></td>
            <td><?= $row -> Tratamiento ?></td>
            
        </tr>
        <?php        endforeach ?>
    </table>

    <?= Html::a(Html::encode('Volver'), ['view', 'id' => $model->idPaciente]) ?>
    
<!-- <div class="col-md-6">
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
            'Tratamiento:ntext',
            // 'idObraSocial',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>  
-->
