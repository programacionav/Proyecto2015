<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

    
    <?php $f = ActiveForm::begin([
        
        "method" => "get",
        "action" => Url::toRoute (['ficha', 'id' => 1]),
        "enableClientValidation" => true,
    ]);
    ?>
    
    <div class="form-group">
        <h4>Ingresa fecha</h4>
        <?= $f->field($form,"q")->input("desde") ?>
        <?= $f->field($form,"h")->input("hasta") ?>
    </div>
    
    <?= Html::submitButton("Filtrar",["class" =>"btn btn-primary"]) ?>
    
    <?php $f -> end()?>
<br>

<h3>Consultas</h3>
    <table class="table table-bordered">
        <tr>
            <th>Fecha y Hora</th>
            <th>Diagnostico</th>
            <th>Tratamiento</th>
        </tr>
        <?php foreach($model as $row){ ?>
        <tr>
            <td><?= $row -> FechaHora ?></td>
            <td><?= $row -> Diagnostico ?></td>
            <td><?= $row -> Tratamiento ?></td>
            
        </tr>
        <?php   } ?>
    </table>

    