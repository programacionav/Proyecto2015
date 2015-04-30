<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\jui\DatePicker;

?>

    
    
    <div class="form-group">
        <h4>Ingresa fecha</h4>
    
        
    <?php $f = ActiveForm::begin([
        "method"=>"post",
        "action"=>url::toRoute(["ficha",'id'=>1]),
        
    ]) ?>
    
     
   <?= $f->field($form, 'q')->input('search')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>
        </div>

    <?= Html::submitButton("buscar",["class"=>"btn btn-primary"])?>
      
    <?php $f->end()?>
      
   
    
    
    

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

    